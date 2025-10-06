<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Periksa langsung di Controller jika pengguna adalah admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman admin.');
        }

        return view('admin.dashboard', ['title' => 'Admin Dashboard']);
    }
}