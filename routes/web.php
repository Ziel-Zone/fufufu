<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Models\Article;

// --- Rute-rute Publik (Accessible oleh siapa saja, termasuk yang belum login) ---
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/book', function () {
    return view('book');
})->name('book');

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

Route::get('/blogfeed', [ArticleController::class, 'index'])->name('blogfeed');

Route::get('/event', [EventController::class, 'index'])->name('event');

// --- Rute Autentikasi (untuk semua pengguna) ---
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Rute untuk Membuat Artikel (Accessible oleh SEMUA pengguna yang sudah login) ---
// Kita akan menggunakan middleware 'auth' agar hanya user yang login bisa menulis
Route::middleware(['auth'])->group(function () {
    Route::get('/write', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::post('/articles/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');

});


// --- Rute Admin (hanya untuk role 'admin' yang sudah login) ---
Route::middleware(['auth', 'has_role:admin'])->group(function () {
    // Admin Dashboard (jika Anda ingin mengaktifkannya lagi)
    // Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rute untuk menghapus artikel (khusus admin)
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // Rute untuk mengelola event (khusus admin)
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');

    // Edit Event
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('events.update');

    // Delete Event
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');



});

Route::post('/tes-hapus-via-post/{article}', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy.test');