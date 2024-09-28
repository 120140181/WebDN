<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactUS;


class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('landing.index');
    }

    public function testEmail()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ];

        try {
            Mail::to('infonotdeninugraha@gmail.com')->send(new ContactUS($data));
            return 'Email sent successfully!';
        } catch (\Exception $e) {
            return 'Failed to send email: ' . $e->getMessage();
        }
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required|min:3',
            'message' => 'required|min:5',
        ]);

        try {
            Mail::to('infonotdeninugraha@gmail.com')->send(new ContactUS($data));
            return redirect()->back()->with('success', 'Pesan Berhasil Terkirim!');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }

    public function service()
    {
        //
        return view('landing.service');
    }

    public function about()
    {
        //
        return view('landing.about');
    }

    public function gallery()
    {
        //
        return view('landing.gallery');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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