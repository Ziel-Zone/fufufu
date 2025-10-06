<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Tambahkan ini untuk helper Str

class Article extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi secara massal dari form
    protected $fillable = [
        'title',
        'slug',
        'author',
        'content',
        'synopsis',
        'featured_image',
        'likes',
        'comments',
        'published_at',
        'user_id'
    ];

    // Opsional: Cast published_at ke tipe Carbon (objek tanggal)
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Definisi relasi ke Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Contoh: Membuat slug secara otomatis saat menyimpan
    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($article) {
    //         $article->slug = Str::slug($article->title);
    //     });
    // }
}