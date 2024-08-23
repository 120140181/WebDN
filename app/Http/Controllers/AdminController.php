<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dashboard');
    }



    public function reminder()
    {
        // Ambil data dari tabel reminders dengan paginasi
        $data = Reminder::paginate(10); // Membatasi 10 data per halaman

        // Kirim data ke view
        return view('admin.reminder', ['data' => $data]);
    }

    

    public function history()
    {
        $data = DB::table('history')->paginate(10);
        return view('admin.history', compact('data'));
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
        $validator = Validator::make($request->all(), [
            'nama_nasabah' => 'required|string',
            'nomor_kwitansi' => 'required|string',
            'status_pembayaran' => 'required',
            'keterangan' => 'nullable|string',
            'tanggal_tagihan' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        // Menyimpan data ke database
        DB::table('reminders')->insert([
            'nama_nasabah' => $request->nama_nasabah,
            'nomor_kwitansi' => $request->nomor_kwitansi,
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
        $upreminder = Reminder::findOrFail($request->reminder_id);
        $upreminder->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        return back()->with('success', 'Reminder berhasil dihapus.');
    }

    /**
     * Approve the specified resource.
     */
    public function approve(Request $request, $id)
    {
        $reminder = Reminder::findOrFail($id);

        // Tandai reminder sebagai di-approve
        $reminder->is_approved = true;
        $reminder->save();

        // Pindahkan data ke tabel history
        DB::table('history')->updateOrInsert(
            ['nomor_kwitansi' => $reminder->nomor_kwitansi],
            [
                'nama_nasabah' => $reminder->nama_nasabah,
                'nomor_kwitansi' => $reminder->nomor_kwitansi,
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
            ->with('success', 'Reminder berhasil disetujui.');
    }

}

