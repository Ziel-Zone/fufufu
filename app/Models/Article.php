<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Kolom-kolom yang boleh diisi secara massal dari form
    protected $fillable = [
        'title',
        'slug',
        'author',
        'featured_image',
        'synopsis',
        'body',
        'likes',
        'comments',
        'published_at',
    ];

    // Opsional: Untuk mengubah kolom tanggal menjadi objek Carbon secara otomatis
    //protected $dates = [
    //    'published_at',
    //];

    // DENGAN INI:
    protected $casts = [
        'published_at' => 'datetime', // <-- Pastikan ini ada
    ];

    // Opsional: Jika Anda ingin Laravel secara otomatis mengelola slug
    // Anda bisa menggunakan package seperti spatie/laravel-sluggable
    // Atau buat mutator sederhana di sini:
    // public function setAuthorAttribute($value)
    // {
    //     $this->attributes['author'] = $value;
    //     $this->attributes['slug'] = \Str::slug($this->title);
    // }
}