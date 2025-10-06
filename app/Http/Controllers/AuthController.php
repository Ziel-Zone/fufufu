<?php

namespace App\Http\Controllers;

use App\Models\User; // Digunakan untuk berinteraksi dengan tabel users
use Illuminate\Http\Request; // Digunakan untuk menangani request HTTP (data dari form)
use Illuminate\Support\Facades\Hash; // Digunakan untuk mengenkripsi password
use Illuminate\Support\Facades\Auth; // Digunakan untuk fitur autentikasi Laravel (login, logout, cek status login)
use Illuminate\Validation\ValidationException; // Digunakan untuk menangani error validasi

class AuthController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // Merender resources/views/auth/register.blade.php
    }

    /**
     * Menangani pengiriman data registrasi.
     */
    public function register(Request $request)
    {
        // 1. Validasi Data yang Diterima dari Form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email harus unik di tabel users
            'password' => 'required|string|min:8|confirmed', // min 8 karakter dan harus dikonfirmasi
        ]);

        // 2. Buat Pengguna Baru di Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-hash
            'role' => 'member', // Default role adalah 'member'
        ]);

        // 3. Login Otomatis Setelah Registrasi (Opsional, tapi bagus untuk UX)
        Auth::login($user);

        // 4. Redirect Pengguna Setelah Registrasi Berhasil
        return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Merender resources/views/auth/login.blade.php
    }

    /**
     * Menangani pengiriman data login.
     */
    public function login(Request $request)
    {
        // 1. Validasi Kredensial
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba Autentikasi Pengguna
        // Auth::attempt() akan mencoba mencari user berdasarkan email dan mencocokkan password
        // Parameter kedua ($request->boolean('remember')) untuk fitur "remember me"
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session untuk mencegah session fixation attacks
            $request->session()->regenerate();

            // Redirect user ke halaman yang dituju setelah login sukses
            // redirect()->intended('/') akan mengarahkan ke URL yang terakhir ingin diakses user
            // sebelum login, atau ke '/' jika tidak ada.
            return redirect()->intended('/')->with('success', 'Selamat datang kembali!');
        }

        // Jika autentikasi gagal, lempar exception dengan pesan error
        return back()->withInput()->with('error', 'Email atau password salah.'); // Mengarahkan kembali ke form login dengan input sebelumnya

        // Atau versi yang lebih sederhana jika tidak ingin custom error message
        // return back()->withInput()->with('error', 'Email atau password salah.');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        // Logout pengguna dari sesi
        Auth::logout();

        // Invalidasi sesi saat ini (menghapus semua data sesi)
        $request->session()->invalidate();

        // Regenerate CSRF token (mengamankan dari serangan CSRF)
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman utama
        return redirect('/login')->with('status', 'Anda telah berhasil logout.');
    }
}