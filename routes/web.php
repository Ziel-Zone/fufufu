<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard',['title'=>'Dashboard']);
});

Route::get('/books', function () {
    return view('books',['title'=>'Books']);
});

Route::get('/transactions', function () {
    return view('transactions',['title'=>'Transactions']);
});

// routes/web.php

Route::get('/blogfeed', function () {
    return view('blogfeed',['title'=>'Blog']);
})->name('blogfeed'); // <--- TAMBAHKAN INI untuk memberi nama 'blogfeed' pada route

Route::get('/event', function () {
    return view('event',['title'=>'Event']);

});

// In routes/web.php

Route::get('/artikel/{id_artikel}', function ($id_artikel) {
    // Buat data dummy untuk artikel
    $dummyArticle = (object) [
        'id' => $id_artikel,
        'title' => "Judul Artikel Detail untuk ID: " . $id_artikel,
        'author' => "Nama Penulis Contoh",
        'timestamp' => "1 Juni 2025", // Atau gunakan Carbon: now()->translatedFormat('j F Y')
        'featuredImage' => 'https://placehold.co/800x450/777/fff?text=Gambar+Artikel+' . $id_artikel, // URL gambar contoh
        'body' => "
            <p>Ini adalah paragraf pembuka untuk artikel dengan ID <strong>{$id_artikel}</strong>. Konten ini adalah contoh untuk melihat bagaimana tampilan halaman detail artikel Anda nantinya. Anda bisa mengisi dengan teks yang lebih panjang dan beragam format.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <h2>Ini Contoh Sub Judul</h2>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <blockquote>Ini adalah contoh blockquote yang bisa Anda gunakan untuk kutipan penting di dalam artikel Anda.</blockquote>
            <p>Pastikan untuk mengganti konten dummy ini dengan logika pengambilan data artikel sebenarnya dari database di controller Anda nanti.</p>
        ",
        'likes' => rand(50, 500), // Angka acak untuk likes
        'comments' => rand(5, 100) // Angka acak untuk komentar
    ];

    // Kirim data dummy ke view 'artikel_detail'
    // Pastikan nama view 'artikel_detail' sudah benar (artikel_detail.blade.php)
    return view('artikel_detail', [
        'title' => $dummyArticle->title, // Untuk tag <title> di HTML
        'article' => $dummyArticle     // Objek artikel dikirim ke view
    ]);
})->name('artikel.show'); // Beri nama route jika belum