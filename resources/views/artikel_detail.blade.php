{{-- resources/views/artikel_detail.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Detail Artikel' }} - Blog Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = { 
            darkMode: 'class',
            theme: {
                extend: {
                    // Jika Anda menggunakan plugin typography, daftarkan di sini atau di file config utama
                }
            },
            plugins: [
                // require('@tailwindcss/typography'), // Aktifkan jika sudah install
            ],
        }
    </script>
    <style>
        /* Jika tidak pakai plugin typography, style kustom bisa di sini */
        .prose-custom h1, .prose-custom h2, .prose-custom h3 { margin-bottom: 0.5em; margin-top: 1em; font-weight: 600; }
        .prose-custom p, .prose-custom blockquote { margin-bottom: 1em; }
        .dark .prose-custom { color: theme('colors.gray.300'); }
        .dark .prose-custom h1, .dark .prose-custom h2, .dark .prose-custom h3 { color: theme('colors.gray.100'); }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white antialiased">

    {{-- Asumsi Anda punya layout utama atau menyertakan navbar secara terpisah --}}
    {{-- @include('layouts.navbar') --}}

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-2xl mx-auto"> 

            <div class="mb-6">
                {{-- Ganti 'blog.feed' dengan nama route halaman feed Anda jika berbeda --}}
                <a href="{{ route('blogfeed') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:underline font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Blog Feed
                </a>
            </div>

            <article class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6 sm:p-8 lg:p-10">
                <header class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-2">{{ $article->title }}</h1>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span>Oleh: {{ $article->author }}</span> - 
                        <span>Dipublikasikan pada {{ $article->timestamp }}</span>
                    </div>
                </header>

                @if($article->featuredImage)
                <div class="mb-6 rounded-lg overflow-hidden">
                    <img src="{{ $article->featuredImage }}" alt="Gambar Utama Artikel {{ $article->title }}" class="w-full h-auto object-cover max-h-96">
                </div>
                @endif

                {{-- Untuk styling konten artikel yang baik, gunakan kelas 'prose' dari @tailwindcss/typography --}}
                {{-- Jika belum install, Anda bisa gunakan kelas 'prose-custom' dari <style> di atas --}}
                <div class="prose lg:prose-lg dark:prose-invert max-w-none prose-custom">
                    {!! $article->body !!} 
                    {{-- Menggunakan {!! !!} karena $article->body mungkin berisi tag HTML. Hati-hati jika sumbernya tidak tepercaya. --}}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Bagaimana menurut Anda tulisan ini?</p>
                    <div class="flex items-center space-x-4">
                         <button class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400 transition-colors py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md text-sm">
                            <i class="far fa-heart mr-2"></i> Suka ({{ $article->likes }})
                        </button>
                        <button class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition-colors py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md text-sm">
                            <i class="far fa-comment mr-2"></i> Komentar ({{ $article->comments }})
                        </button>
                        <button class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition-colors py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md text-sm">
                            <i class="fas fa-share-alt mr-2"></i> Bagikan
                        </button>
                    </div>
                </div>
                <div id="commentsSection" class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Komentar</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Fitur komentar akan segera hadir.</p>
                </div>
            </article>
        </div>
    </div>

    {{-- Hapus script JS yang ada di file HTML halaman artikel sebelumnya untuk memuat konten, karena sekarang data dari Laravel --}}
</body>
</html>