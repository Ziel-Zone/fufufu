<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth Facade

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        // Pastikan user memiliki peran yang sesuai
        // Auth::user()->role akan mengambil nilai kolom 'role' dari user yang sedang login
        // $role adalah peran yang diharapkan (misalnya 'admin' atau 'member') yang akan dikirim melalui rute
        if (Auth::user()->role !== $role) {
            // Jika peran tidak cocok, redirect kembali atau tampilkan halaman 403 Forbidden
            // Contoh: redirect()->back() atau abort(403)
            // Untuk saat ini, kita redirect ke halaman utama dengan pesan error
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Jika user login dan memiliki peran yang sesuai, lanjutkan request
        return $next($request);
    }
}