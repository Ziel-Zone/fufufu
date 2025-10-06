<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>{{ $title ?? 'Edit Event' }}</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Event</h1>
            </div>
        </header>

        <main>
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="max-w-4xl mx-auto">
                    {{-- Navbar Minimalis --}}
                    <nav class="mb-12 py-4 border-b border-gray-200">
                        <a href="/event" class="text-blue-600 hover:underline flex items-center text-xl font-semibold">
                            <i class="fas fa-arrow-left mr-3"></i> Kembali ke Event
                        </a>
                    </nav>

                    {{-- Form --}}
                    <form action="{{ route('events.update', $event->id) }}" method="POST"
                          class="bg-white shadow-lg rounded-xl p-8 sm:p-10 border border-gray-200 space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Pesan Sukses --}}
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Sukses!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        {{-- Pesan Error Validasi --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">Ada beberapa masalah dengan input Anda:</span>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Event</label>
                            <input type="text" name="title" id="title"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="Masukkan judul event" value="{{ old('title', $event->title) }}" required>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="description" id="description" rows="5"
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      placeholder="Deskripsikan event ini..." required>{{ old('description', $event->description) }}</textarea>
                        </div>
                        
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal & Waktu</label>
                            <input type="datetime-local" name="date" id="date"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i')) }}" required>
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <input type="text" name="location" id="location"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="Lokasi event" value="{{ old('location', $event->location) }}" required>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex justify-end space-x-4">
                            <a href="/event"
                               class="px-6 py-3 rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 font-semibold">
                                Batal
                            </a>
                            <button type="submit"
                                    class="px-6 py-3 rounded-md bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
