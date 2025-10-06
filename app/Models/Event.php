<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal (mass assignable).
     * Kolom-kolom ini harus sesuai dengan yang ada di migrasi Anda.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'location',
        'date',
    ];
}