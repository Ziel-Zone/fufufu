{{-- resources/views/tulis-artikel.blade.php --}}

<x-layout>
    <x-slot:title>Tulis Artikel Baru - Perpustakaan</x-slot:title>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">

            {{-- Navbar Minimalis --}}
            <nav class="mb-12 py-4 border-b border-gray-200">
                <a href="{{ route('blogfeed') }}" class="text-blue-600 hover:underline flex items-center text-xl font-semibold">
                    <i class="fas fa-arrow-left mr-3"></i> Kembali ke Blog Feed
                </a>
            </nav>

            {{-- Header Halaman --}}
            <header class="text-center mb-10">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-500 leading-tight mb-4">
                    Tulis Artikel Baru
                </h1>
                <p class="text-lg text-gray-600">
                    Bagikan cerita, ide, atau informasi menarik Anda.
                </p>
            </header>

            {{-- Form --}}
            <form action="{{ route('tulis-artikel') }}" method="POST" enctype="multipart/form-data"
                  class="bg-white shadow-lg rounded-xl p-8 sm:p-10 border border-gray-200 space-y-6">
                @csrf

                {{-- Judul Artikel --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                    <input type="text" id="title" name="title"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Masukkan judul artikel Anda" required>
                </div>

                {{-- Nama Penulis --}}
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Nama Penulis</label>
                    <input type="text" id="author" name="author"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Nama Anda" required>
                </div>

                {{-- Gambar Utama --}}
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama (Opsional)</label>
                    <input type="file" id="featured_image" name="featured_image"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md
                                  file:border-0 file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
                                 ">
                </div>

                {{-- Sinopsis --}}
                <div>
                    <label for="synopsis" class="block text-sm font-medium text-gray-700 mb-1">Sinopsis / Ringkasan Singkat</label>
                    <textarea id="synopsis" name="synopsis" rows="3"
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Berikan ringkasan singkat tentang artikel Anda" required></textarea>
                </div>

                {{-- Isi Artikel --}}
                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Isi Artikel</label>
                    <textarea id="body" name="body" rows="15"
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Tuliskan isi artikel Anda di sini..." required></textarea>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('blogfeed') }}"
                       class="px-6 py-3 rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 font-semibold">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-3 rounded-md bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Publikasikan Artikel
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-layout>
