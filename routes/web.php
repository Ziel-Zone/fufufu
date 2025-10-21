<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController; // Import ArticleController
// Import controller lain jika Anda menggunakannya, contoh:
// use App\Http\Controllers\BookController;
// use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\EventController;

// =========================================================================
// Rute Halaman Utama / Default
// Ini adalah halaman yang akan dibuka saat Anda mengakses '/'
// Menggunakan ArticleController::index() karena sudah menyiapkan $title dan $articles
// =========================================================================
Route::get('/', [ArticleController::class, 'index'])->name('home');

// =========================================================================
// Rute untuk Halaman-halaman Aplikasi Anda (berdasarkan navbar)
// =========================================================================

// Rute untuk Blog Feed (jika diakses langsung melalui /blogfeed)
// Juga menggunakan ArticleController::index() untuk konsistensi
Route::get('/blogfeed', [ArticleController::class, 'index'])->name('blogfeed');

// Rute untuk membuat artikel baru (dari ArticleController)
Route::get('/tulis-artikel', [ArticleController::class, 'create'])->name('tulis-artikel');
// Rute untuk menyimpan artikel baru (dari ArticleController)
Route::post('/tulis-artikel', [ArticleController::class, 'store'])->name('artikel.store');

// Rute untuk menampilkan artikel individual (dari ArticleController)
// Menggunakan Route Model Binding dengan slug
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('artikel.show');


// Rute untuk Books
// Jika Anda punya BookController, ubah ini: [BookController::class, 'index']
Route::get('/books', function () {
    $title = "Daftar Buku"; // Variabel $title untuk halaman Books
    return view('books', ['title' => $title]);
})->name('books');

// Rute untuk Transactions
// Jika Anda punya TransactionController, ubah ini: [TransactionController::class, 'index']
Route::get('/transactions', function () {
    $title = "Daftar Transaksi"; // Variabel $title untuk halaman Transactions
    return view('transactions', ['title' => $title]);
})->name('transactions');

// Rute untuk Event
// Jika Anda punya EventController, ubah ini: [EventController::class, 'index']
Route::get('/event', function () {
    $title = "Jadwal Event"; // Variabel $title untuk halaman Event
    return view('event', ['title' => $title]);
})->name('event');