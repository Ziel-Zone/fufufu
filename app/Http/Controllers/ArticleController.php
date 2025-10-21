<?php

namespace App\Http\Controllers;

use App\Models\Article; // Pastikan Model Article di-import
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str untuk Str::slug()
use App\Http\Controllers\Controller; // Pastikan base Controller di-import

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel (untuk halaman blog feed).
     */
    public function index()
    {
        // Ambil semua artikel dari database, diurutkan berdasarkan tanggal publikasi terbaru
        // Anda bisa menambahkan ->whereNotNull('published_at') jika hanya ingin artikel yang sudah dipublikasi
        $articles = Article::latest('published_at')->get();

        return view('blogfeed', [
            'title' => 'Blog Feed',
            'articles' => $articles // Meneruskan variabel $articles ke view
        ]);
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('tulis-artikel', [
            'title' => 'Tulis Artikel Baru'
        ]);
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional, gambar max 2MB
            'synopsis' => 'required',
            'body' => 'required',
        ]);

        // Buat slug dari judul
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        // Handle upload gambar jika ada
        if ($request->hasFile('featured_image')) {
            // Simpan gambar di storage/app/public/article_images
            $imagePath = $request->file('featured_image')->store('article_images', 'public');
            // Simpan path yang bisa diakses publik (misal: /storage/article_images/namafile.jpg)
            $validatedData['featured_image'] = '/storage/' . $imagePath;
        }

        // Inisialisasi likes dan comments, serta set tanggal publikasi
        $validatedData['likes'] = 0;
        $validatedData['comments'] = 0;
        $validatedData['published_at'] = now(); // Set tanggal publikasi saat ini

        // Simpan data ke database
        Article::create($validatedData);

        // Redirect ke halaman blog feed dengan pesan sukses
        return redirect()->route('blogfeed')->with('success', 'Artikel berhasil dipublikasikan!');
    }

    /**
     * Menampilkan artikel individual.
     */
    public function show(Article $article) // Menggunakan Route Model Binding
    {
        // Laravel akan otomatis menemukan artikel berdasarkan 'slug' dari URL
        // jika route Anda didefinisikan seperti: Route::get('/artikel/{article:slug}', ...)
        return view('artikel_detail', [
            'title' => $article->title, // Judul halaman diambil dari judul artikel
            'article' => $article // Meneruskan objek artikel ke view
        ]);
    }

    // Method lain (edit, update, destroy) bisa ditambahkan nanti
    // public function edit(Article $article) { ... }
    // public function update(Request $request, Article $article) { ... }
    // public function destroy(Article $article) { ... }
}