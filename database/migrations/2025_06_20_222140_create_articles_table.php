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
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Judul artikel
            $table->string('slug')->unique(); // Slug untuk URL, harus unik
            $table->string('author'); // Nama penulis (sementara, nanti bisa jadi user_id)
            $table->longText('content'); // Isi artikel lengkap
            $table->text('synopsis')->nullable(); // Ringkasan artikel, bisa kosong
            $table->string('featured_image')->nullable(); // Path gambar unggulan, bisa kosong
            $table->integer('likes')->default(0); // Jumlah like, default 0
            $table->integer('comments')->default(0); // Jumlah komentar, default 0
            $table->timestamp('published_at')->nullable(); // Tanggal publikasi, bisa kosong
            $table->timestamps(); // created_at dan updated_at
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
