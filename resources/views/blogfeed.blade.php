{{-- resources/views/blogfeed.blade.php --}}

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Ini adalah konten spesifik halaman blog feed Anda --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Blog Feed</h1>
                <p class="text-gray-600">Baca tulisan terbaru dari komunitas perpustakaan.</p>
            </div>

            <a href="{{ route('tulis-artikel') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                     ">
                <i class="fas fa-plus-circle mr-2"></i> Buat Artikel
            </a>
        </header>

        <main id="blogFeedContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> {{-- Gunakan grid untuk tata letak kartu blog --}}

            @forelse ($articles as $article)
                {{-- PERUBAHAN STYLING DIMULAI DI SINI --}}
                <div class="blog-card bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">
                    <a href="{{ route('artikel.show', $article->slug) }}" class="block p-5 flex flex-col flex-grow group focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg">
                        @if($article->featured_image)
                        <img src="{{ asset($article->featured_image) }}" alt="Katanya Gambar Artikel {{ $article->title }}" class="w-full h-48 object-cover mb-4 rounded-md">
                        @endif
                        <div class="mb-3">
                            <h4 class="text-sm font-semibold text-gray-700 group-hover:text-blue-700 transition-colors">{{ $article->author }}</h4>
                            <p class="text-xs text-gray-500">{{ $article->published_at ? $article->published_at->diffForHumans() : 'Belum dipublikasi' }}</p>
                        </div>

                        <div class="flex-grow">
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors leading-tight">
                                {{ $article->title }}
                            </h2>
                            <p class="text-gray-600 text-base leading-relaxed line-clamp-3 group-hover:text-gray-700 transition-colors">
                                {{ $article->synopsis }}
                            </p>
                        </div>

                        <div class="mt-4 pt-3 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex space-x-4"> {{-- Diubah dari space-x-3 menjadi space-x-4 --}}
                                    <span class="inline-flex items-center text-gray-500 group-hover:text-blue-500 transition-colors" title="Suka">
                                        <i class="far fa-heart mr-1 text-base"></i> {{-- Ukuran icon diubah --}}
                                        <span class="text-sm">{{ $article->likes }}</span> {{-- Ukuran teks diubah --}}
                                    </span>
                                    <span class="inline-flex items-center text-gray-500 group-hover:text-blue-500 transition-colors" title="Komentar">
                                        <i class="far fa-comment mr-1 text-base"></i> {{-- Ukuran icon diubah --}}
                                        <span class="text-sm">{{ $article->comments }}</span> {{-- Ukuran teks diubah --}}
                                    </span>
                                </div>
                                <span class="inline-flex items-center text-gray-500 group-hover:text-blue-500 transition-colors" title="Bagikan">
                                    <i class="fas fa-share-alt text-base"></i> {{-- Ukuran icon diubah --}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- PERUBAHAN STYLING BERAKHIR DI SINI --}}
            @empty
                <p class="col-span-full text-center text-gray-500 py-10">Belum ada artikel yang dipublikasikan.</p>
            @endforelse
        </main>
    </div>

</x-layout>