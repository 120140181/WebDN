<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        // Ambil semua data dari tabel reminders
        $data = DB::table('reminders')->get();

        // Kirim data ke view
        return view('admin.reminder', ['data' => $data]);
    }


    public function history()
    {
        //
        return view('admin.history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.tambahReminder');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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
        $data = [
            'nama_nasabah' => $request->nama_nasabah,
            'nomor_kwitansi' => $request->nomor_kwitansi,
            'status_pembayaran' => $request->status_pembayaran,
            'keterangan' => $request->keterangan,
            'tanggal_tagihan' => $request->tanggal_tagihan,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Simpan data ke database
        DB::table('reminders')->insert($data);

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
