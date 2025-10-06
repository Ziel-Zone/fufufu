<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Tampilkan semua artikel (Blog Feed)
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        $comments = Comment::all();

        return view('blogfeed', [
            'articles' => $articles,
            'comments' => $comments,
            'title' => 'Blog Feed'
        ]);
    }

    // Tampilkan form membuat artikel
    public function create()
    {
        return view('write', [
            'title' => 'Buat Artikel Baru'
        ]);
    }

    // Simpan artikel baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:articles,title',
            'author' => 'required|string|max:255',
            'synopsis' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['published_at'] = now();
        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('articles_images', 'public');
            $validatedData['featured_image'] = $imagePath;
        } else {
            $validatedData['featured_image'] = 'https://placehold.co/600x300/4f46e5/ffffff?text=Artikel+Baru';
        }

        Article::create($validatedData);

        return redirect('/blogfeed')->with('success', 'Artikel berhasil dibuat!');
    }

    // Tampilkan form edit artikel
    public function edit(Article $article)
    {
        if (Auth::id() !== $article->user_id && Auth::user()->role !== 'admin') {
            return redirect('/blogfeed')->with('error', 'Anda tidak memiliki izin untuk mengedit artikel ini.');
        }

        return view('edit', [
            'title' => 'Edit Artikel',
            'article' => $article
        ]);
    }

    // Update artikel
    public function update(Request $request, Article $article)
    {
        if (Auth::id() !== $article->user_id && Auth::user()->role !== 'admin') {
            return redirect('/blogfeed')->with('error', 'Anda tidak memiliki izin untuk memperbarui artikel ini.');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:articles,title,' . $article->id,
            'author' => 'required|string|max:255',
            'synopsis' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama jika bukan link eksternal
            if ($article->featured_image && !Str::startsWith($article->featured_image, 'http')) {
                Storage::disk('public')->delete($article->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('articles_images', 'public');
            $validatedData['featured_image'] = $imagePath;
        }

        $article->update($validatedData);

        return redirect('/blogfeed')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy(Article $article)
    {
        $user = Auth::user();

        // Hanya admin atau pemilik artikel yang bisa menghapus
        if ($user->role !== 'admin' && $user->id !== $article->user_id) {
            return redirect()->route('blogfeed')->with('error', 'Anda tidak memiliki izin untuk menghapus artikel ini.');
        }

        if ($article->featured_image && !Str::startsWith($article->featured_image, 'http')) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('blogfeed')->with('success', 'Artikel berhasil dihapus.');
    }
}
