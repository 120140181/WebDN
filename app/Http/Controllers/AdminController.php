<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Reminder;
use App\Jobs\SendTelegramReminder;
use Illuminate\Http\Request;
use App\Events\ReminderSaved;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hitung jumlah tagihan lunas
        $tagihanLunas = History::where('status_pembayaran', 'Lunas')->count();

        // Hitung jumlah tagihan dibatalkan
        $tagihanDibatalkan = History::where('status_pembayaran', 'Canceled')->count();

        // Hitung total nominal tagihan aktif
        $totalTagihanAktif = History::where('status_pembayaran', 'Pending')->count();
        $totalTagihanAktif = Reminder::where('status_pembayaran', 'Pending')->count();

        // Hitung total nominal tagihan
        $totalNominalTagihan = History::sum('nominal_tagihan'); // Pastikan tabel dan kolom sesuai
        $totalNominalTagihan = Reminder::sum('nominal_tagihan');

        // Hitung total tagihan yang lunas
        $totalTagihanLunas = History::where('status_pembayaran', 'Lunas')->sum('nominal_tagihan');

        // Mendapatkan data bulan dan total tagihan lunas
        $data = DB::table('history')
            ->select(DB::raw('MONTH(tanggal_tagihan) as month'), DB::raw('SUM(nominal_tagihan) as total'))
            ->where('status_pembayaran', 'Lunas')
            ->groupBy(DB::raw('MONTH(tanggal_tagihan)'))
            ->get();

        // Format data untuk Chart.js
        $months = [];
        $totals = [];
        foreach ($data as $item) {
            $months[] = Carbon::create()->month($item->month)->format('F'); // Mengubah nomor bulan ke nama bulan
            $totals[] = $item->total;
        }

        // Kirim data ke view
        return view('admin.dashboard', [
            'tagihanLunas' => $tagihanLunas,
            'tagihanDibatalkan' => $tagihanDibatalkan,
            'totalTagihanAktif' => $totalTagihanAktif,
            'totalNominalTagihan' => $totalNominalTagihan,
            'totalTagihanLunas' => $totalTagihanLunas,
            'months' => $months,
            'totals' => $totals,
        ]);
    }


    public function reminder()
    {
        // Ambil data dari tabel reminders
        $data = Reminder::get();

        // Menghitung total nominal_tagihan dari seluruh data di tabel
        $totalTagihan = Reminder::sum('nominal_tagihan');

        // Kirim data dan total tagihan ke view
        return view('admin.reminder', ['data' => $data, 'totalTagihan' => $totalTagihan]);
    }



    public function history()
    {
        // Ambil data dari tabel history
        $data = History::get();

        // Hitung total nominal tagihan lunas
        $totalTagihanLunas = History::where('status_pembayaran', 'Lunas')->sum('nominal_tagihan');

        // Kirim data dan total tagihan lunas ke view
        return view('admin.history', compact('data', 'totalTagihanLunas'));
    }

    public function getAllHistory()
    {
        $data = DB::table('history')->get(); // Ambil semua data dari tabel 'history'
        return response()->json($data);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.modalReminder');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_nasabah' => 'required|string|max:255',
            'nomor_kwitansi' => 'required|string|max:255',
            'nominal_tagihan' => 'required|string',
            'status_pembayaran' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_tagihan' => 'required|date',
        ]);

        // Menghapus titik dari nominal_tagihan untuk mengubahnya menjadi angka
        $nominalTagihan = str_replace('.', '', $validated['nominal_tagihan']);

        // Menyimpan data ke database menggunakan Eloquent dengan nominal_tagihan yang telah dimodifikasi
        $reminder = Reminder::create([
            'nama_nasabah' => $validated['nama_nasabah'],
            'nomor_kwitansi' => $validated['nomor_kwitansi'],
            'nominal_tagihan' => $nominalTagihan,
            'status_pembayaran' => $validated['status_pembayaran'],
            'keterangan' => $validated['keterangan'] ?? null,
            'tanggal_tagihan' => $validated['tanggal_tagihan'],
            'user_id' => Auth::id(),
        ]);

        // Jika pengiriman langsung diperlukan, jalankan job pengingat
        if ($reminder->tanggal_tagihan == now()->toDateString()) {
            dispatch(new \App\Jobs\SendTelegramReminder($reminder))->delay(now()->setTime(7, 0));
        }

        // Trigger event untuk mengirim notifikasi
        event(new ReminderSaved($reminder));

        // Redirect ke halaman reminder dengan pesan sukses
        return redirect()->route('admin.reminder')->with('success', 'Reminder berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Hapus format titik dari nominal_tagihan
        $nominalTagihan = str_replace('.', '', $request->nominal_tagihan);

        $upreminder = Reminder::findOrFail($request->reminder_id);
        $upreminder->nominal_tagihan = $nominalTagihan;
        $upreminder->update($request->except('nominal_tagihan')); // Update other fields

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $reminder = Reminder::findOrFail($id);

        // Tandai reminder sebagai di-cancel
        $reminder->is_canceled = true;
        $reminder->status_pembayaran = 'Canceled';
        $reminder->save();

        // Pindahkan data ke tabel history
        DB::table('history')->insert([
            'nama_nasabah' => $reminder->nama_nasabah,
            'nomor_kwitansi' => $reminder->nomor_kwitansi,
            'nominal_tagihan' => $reminder->nominal_tagihan,
            'status_pembayaran' => $reminder->status_pembayaran,
            'keterangan' => $reminder->keterangan,
            'tanggal_tagihan' => $reminder->tanggal_tagihan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hapus data dari tabel reminders
        $reminder->delete();

        // Ambil parameter halaman dari request
        $page = $request->query('page', 1);

        // Redirect ke halaman yang sama
        return redirect()->route('admin.reminder', ['page' => $page])
            ->with('success', 'Reminder berhasil dibatalkan.');
    }

    /**
     * Approve the specified resource.
     */
    public function approve(Request $request, $id)
    {
        $reminder = Reminder::findOrFail($id);

        // Tandai reminder sebagai di-approve
        $reminder->is_approved = true;
        $reminder->status_pembayaran = 'Lunas';
        $reminder->save();

        // Pindahkan data ke tabel history
        DB::table('history')->insert([
            'nama_nasabah' => $reminder->nama_nasabah,
            'nomor_kwitansi' => $reminder->nomor_kwitansi,
            'nominal_tagihan' => $reminder->nominal_tagihan,
            'status_pembayaran' => $reminder->status_pembayaran,
            'keterangan' => $reminder->keterangan,
            'tanggal_tagihan' => $reminder->tanggal_tagihan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hapus data dari tabel reminders
        $reminder->delete();

        // Ambil parameter halaman dari request
        $page = $request->query('page', 1);

        // Redirect ke halaman yang sama
        return redirect()->route('admin.reminder', ['page' => $page])
            ->with('success', 'Reminder berhasil disetujui.');
    }

    public function sendReminder($reminderId)
    {
        $reminder = Reminder::find($reminderId);
        if ($reminder) {
            SendTelegramReminder::dispatch($reminder);
            return response()->json(['message' => 'Reminder has been queued.']);
        } else {
            return response()->json(['message' => 'Reminder not found.'], 404);
        }
    }
}

