<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $totalTagihanAktif = Reminder::where('status_pembayaran', 'Pending')->count();

        // Hitung total nominal tagihan
        $totalNominalTagihan = Reminder::sum('nominal_tagihan');

        // Hitung total tagihan yang lunas
        $totalTagihanLunas = History::where('status_pembayaran', 'Lunas')->sum('nominal_tagihan');


        // Kirim data ke view
        return view('admin.dashboard', [
            'tagihanLunas' => $tagihanLunas,
            'tagihanDibatalkan' => $tagihanDibatalkan,
            'totalTagihanAktif' => $totalTagihanAktif,
            'totalNominalTagihan' => $totalNominalTagihan,
            'totalTagihanLunas' => $totalTagihanLunas,
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
        $validator = Validator::make($request->all(), [
            'nama_nasabah' => 'required|string',
            'nomor_kwitansi' => 'required|string',
            'nominal_tagihan' => 'required|string',
            'status_pembayaran' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_tagihan' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        // Menghapus titik dari nominal_tagihan
        $nominalTagihan = str_replace('.', '', $request->nominal_tagihan);

        // Menyimpan data ke database
        DB::table('reminders')->insert([
            'nama_nasabah' => $request->nama_nasabah,
            'nomor_kwitansi' => $request->nomor_kwitansi,
            'nominal_tagihan' => $nominalTagihan,
            'status_pembayaran' => $request->status_pembayaran,
            'keterangan' => $request->keterangan,
            'tanggal_tagihan' => $request->tanggal_tagihan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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

        // Tandai reminder sebagai di-approve
        $reminder->is_canceled = true;
        $reminder->status_pembayaran = 'Canceled';
        $reminder->save();

        // Pindahkan data ke tabel history
        DB::table('history')->updateOrInsert(
            [
                'nama_nasabah' => $reminder->nama_nasabah,
                'nomor_kwitansi' => $reminder->nomor_kwitansi,
                'nominal_tagihan' => $reminder->nominal_tagihan,
                'status_pembayaran' => $reminder->status_pembayaran,
                'keterangan' => $reminder->keterangan,
                'tanggal_tagihan' => $reminder->tanggal_tagihan,
                'created_at' => $reminder->created_at,
                'updated_at' => $reminder->updated_at,
            ]
        );

        // Hapus data dari tabel reminders jika diperlukan
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
            'created_at' => now(),  // Menggunakan waktu sekarang untuk created_at dan updated_at
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

}

