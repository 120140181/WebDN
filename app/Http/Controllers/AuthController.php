<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Menggunakan Auth::attempt dengan pengecekan password hash secara otomatis
        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        // Kembali ke form login jika gagal dengan pesan error
        return redirect()->route('auth.login')->with('failed', 'Username atau Password salah.');
    }

    public function logout(Request $request)
    {
        // Proses logout pengguna
        Auth::logout();

        // Menghapus session saat logout
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login
        return redirect()->route('auth.login');
    }

}
