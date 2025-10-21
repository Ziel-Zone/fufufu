{{-- resources/views/artikel_detail.blade.php --}}

<!DOCTYPE html>
<html lang="id" class="dark h-full"> {{-- Tambahkan h-full untuk body agar tidak ada scrollbar aneh --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Mengatur title halaman langsung dengan judul artikel --}}
    <title>{{ $article->title ?? 'Judul Artikel Tidak Ditemukan' }}</title> 
    
    {{-- Memuat Tailwind CSS. Jika Anda pakai Vite, @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script>
        tailwind.config = { 
            darkMode: 'class',
            theme: {
                extend: {
                    // Jika Anda menggunakan plugin typography, pastikan terdaftar di tailwind.config.js utama
                    // Jika tidak, style kustom di bawah ini akan bekerja
                }
            },
            plugins: [
                // require('@tailwindcss/typography'), // Aktifkan jika sudah install di tailwind.config.js utama
            ],
        }
    </script>
    <style>
        /*
        Jika plugin @tailwindcss/typography tidak diinstal/digunakan,
        Anda bisa menyesuaikan ukuran font secara manual di sini
        untuk elemen-elemen di dalam div.prose-custom.
        Kelas .prose-custom akan diterapkan pada div konten artikel.
        */
        .prose-custom h1, .prose-custom h2, .prose-custom h3 { margin-bottom: 0.75em; margin-top: 1.5em; font-weight: 700; line-height: 1.2; }
        .prose-custom h1 { font-size: 2.5rem; } /* 40px */
        .prose-custom h2 { font-size: 2rem; }   /* 32px */
        .prose-custom h3 { font-size: 1.75rem; } /* 28px */
        .prose-custom p, .prose-custom li, .prose-custom blockquote { margin-bottom: 1.25em; font-size: 1.125rem; line-height: 1.8; } /* 18px */
        .prose-custom ul, .prose-custom ol { padding-left: 1.5em; }
        .prose-custom a { color: theme('colors.blue.600'); text-decoration: underline; }
        .prose-custom blockquote { border-left: 4px solid theme('colors.gray.300'); padding-left: 1em; color: theme('colors.gray.600'); font-style: italic; }
        .dark .prose-custom p, .dark .prose-custom li, .dark .prose-custom blockquote { color: theme('colors.gray.200'); }
        .dark .prose-custom h1, .dark .prose-custom h2, .dark .prose-custom h3 { color: theme('colors.white'); }
        .dark .prose-custom a { color: theme('colors.blue.400'); }
        .dark .prose-custom blockquote { border-left-color: theme('colors.gray.700'); color: theme('colors.gray.400'); }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased min-h-screen">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto"> {{-- Kontainer utama diperlebar menjadi max-w-4xl --}}

            {{-- Navbar minimalis: Hanya satu link "Kembali ke Blog Feed" --}}
            <nav class="mb-12 py-4 border-b border-gray-200">
                <a href="{{ route('blogfeed') }}" class="text-blue-600 hover:underline flex items-center text-xl font-semibold">
                    <i class="fas fa-arrow-left mr-3"></i> Kembali ke Blog Feed
                </a>
            </nav>
            
            {{-- Bagian Header Artikel --}}
            <header class="text-center mb-10">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
                    {{ $article->title }}
                </h1>
                <div class="text-lg text-gray-600">
                    <span>Oleh: <span class="font-semibold">{{ $article->author }}</span></span> - 
                    <span>Dipublikasikan pada {{ $article->timestamp }}</span>
                </div>
            </header>

            {{-- Gambar Utama Artikel --}}
            @if($article->featuredImage)
            <div class="mb-12 rounded-xl overflow-hidden shadow-lg border border-gray-200">
                <img src="{{ $article->featuredImage }}" alt="Gambar Utama Artikel {{ $article->title }}" class="w-full h-auto object-cover max-h-[450px]"> {{-- Diperbesar sedikit --}}
            </div>
            @endif

            {{-- Konten Artikel --}}
            {{-- Jika Anda menggunakan @tailwindcss/typography, gunakan:
            <div class="prose prose-xl lg:prose-2xl mx-auto">
            Jika tidak, gunakan kelas prose-custom yang didefinisikan di <style>
            --}}
            <div class="prose-custom">
                {!! $article->body !!} 
            </div>

            {{-- Bagian Interaksi (Like, Comment, Share) --}}
            <div class="mt-12 pt-10 border-t border-gray-200 flex flex-col items-center">
                <p class="text-lg text-gray-600 mb-5">Bagaimana menurut Anda tulisan ini?</p>
                <div class="flex items-center space-x-8">
                       <button class="inline-flex items-center text-gray-600 hover:text-red-500 transition-colors py-3 px-6 border border-gray-300 rounded-xl text-lg font-medium">
                            <i class="far fa-heart mr-3 text-2xl"></i> Suka ({{ $article->likes }})
                        </button>
                        <button class="inline-flex items-center text-gray-600 hover:text-blue-500 transition-colors py-3 px-6 border border-gray-300 rounded-xl text-lg font-medium">
                            <i class="far fa-comment mr-3 text-2xl"></i> Komentar ({{ $article->comments }})
                        </button>
                        <button class="inline-flex items-center text-gray-600 hover:text-blue-500 transition-colors py-3 px-6 border border-gray-300 rounded-xl text-lg font-medium">
                            <i class="fas fa-share-alt mr-3 text-2xl"></i> Bagikan
                        </button>
                </div>
            </div>

            {{-- Bagian Komentar --}}
            <div id="commentsSection" class="mt-12 pt-8 border-t border-gray-200 max-w-2xl mx-auto"> {{-- Tambahkan border-top juga --}}
                <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Komentar</h3>
                <p class="text-base text-gray-500 text-center">Fitur komentar akan segera hadir.</p>
            </div>

        </div> {{-- Tutup div.max-w-4xl --}}
    </div> {{-- Tutup div.container --}}

</body>
</html>