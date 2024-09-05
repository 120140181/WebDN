<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Menggunakan response helper untuk mengatur header
        $response = response()->view('auth.login');

        // Menambahkan header cache control
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');

        return $response;
    }



    public function login_proses(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('auth.login')->with('failed', 'Username atau Password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Kamu Berhasil Logout');
    }

}

