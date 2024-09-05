<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('auth.login'); // Arahkan ke halaman login jika belum terautentikasi
        }

        // Proses request dan tambahkan header no-cache
        $response = $next($request);

        // Mencegah caching halaman admin
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');

        return $response;
    }


}
