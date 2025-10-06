<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi secara massal
    protected $fillable = [
        'article_id',
        'author',
        'body',
    ];

    // Definisi relasi ke Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}