<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis (primary key, auto-increment)
            $table->string('title'); // Judul artikel
            $table->string('slug')->unique(); // Slug untuk URL yang SEO-friendly (harus unik)
            $table->string('author'); // Nama penulis
            $table->string('featured_image')->nullable(); // Path gambar utama, bisa kosong
            $table->text('synopsis'); // Ringkasan singkat
            $table->longText('body'); // Isi artikel, bisa sangat panjang
            $table->integer('likes')->default(0); // Jumlah like, default 0
            $table->integer('comments')->default(0); // Jumlah komentar, default 0
            $table->timestamp('published_at')->nullable(); // Tanggal publikasi, bisa kosong (untuk draft)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};