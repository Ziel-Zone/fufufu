<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Daftarkan middleware kustom Anda dengan alias
        $middleware->alias([
            'has_role' => \App\Http\Middleware\CheckRole::class, // Pastikan alias 'has_role' menunjuk ke CheckRole Anda
        ]);

        // Laravel 12 secara default sudah mengaktifkan middleware grup web yang diperlukan.
        // Anda tidak perlu menambahkannya secara manual di sini kecuali ada kebutuhan spesifik.
        // Contoh jika Anda perlu menambahkan middleware ke grup web:
        // $middleware->web(append: [
        //     \App\Http\Middleware\VerifyCsrfToken::class, // Contoh, ini sudah default aktif
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Di sini Anda dapat mendaftarkan penanganan pengecualian kustom
    })->create();

