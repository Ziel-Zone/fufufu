<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // <-- Ini adalah kelas dasar

class Controller extends BaseController // <-- Pastikan ini meng-extend BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}