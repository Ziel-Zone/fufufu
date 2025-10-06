<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{-- Ini sudah benar dan harus tetap ada --}}
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>Dashboard</title> {{-- Kamu bisa ganti ini jadi "Book" atau apa saja --}}
</head>
<body class="h-full">
  <div class="min-h-full">
  <nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              {{-- Dashboard Link --}}
              <a href="/" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}" 
                 aria-current="{{ request()->is('/') ? 'page' : 'false' }}">
                  Dashboard
              </a>

              {{-- Book Link --}}
              <a href="/book" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('book') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Book
              </a>

              {{-- Transactions Link --}}
              <a href="/transactions" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('transactions') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Transactions
              </a>

              {{-- Blog Feed Link --}}
              <a href="/blogfeed" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('blogfeed') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Blog Feed
              </a>

              {{-- Event Link --}}
              <a href="/event" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('event') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Event
              </a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
              </svg>
            </button>

            <div class="relative ml-3">
              <div>
              <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </button>
              </div>

              <div x-show="isOpen"
                  x-transition:enter="transition ease-out duration-100 transform"
                  x-transition:enter-start="opacity-0 scale-95"
                  x-transition:enter-end="opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75 transform"
                  x-transition:leave-start="opacity-100 scale-100"
                  x-transition:leave-end="opacity-0 scale-95"
                  class="absolute right-0 mt-2 w-56 origin-top-right rounded-md shadow-lg"
                  class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hidden md:hidden"> 
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Book</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Transactions</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog Feed</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Event</a>
      </div>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Book</h1>
    </div>
  </header>
  <main>
    {{-- TEMPEL KODE DARI books.blade.php DI SINI --}}
    {{-- Mulai dari <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8"> --}}
    {{-- ... hingga akhir section terakhir ... --}}
    {{-- Pastikan HANYA konten HTML dari body books.blade.php yang ditempel, --}}
    {{-- tanpa tag <body>, <head>, <!DOCTYPE html>, atau <x-layout> yang lama --}}

    {{-- KODE DARI books.blade.php BERIKUT INI DIMULAI DARI SINI: --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <section class="mb-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">
                Buku Pinjaman Anda
            </h1>
            <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 p-6">
                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 p-4 rounded-lg border border-gray-200 bg-gray-50">
                        <img src="https://placehold.co/100x150/gray/white?text=Buku+A" alt="Sampul Buku A" class="w-20 h-30 object-cover rounded-md flex-shrink-0">
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900">Judul Buku Pinjaman A</h3>
                            <p class="text-sm text-gray-500 mb-1">Penulis A</p>
                            <p class="text-xs text-red-600 font-medium">Jatuh tempo: 5 Juni 2025 (Sisa 4 hari)</p>
                            <div class="mt-2">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 43%;"></div> </div>
                                <p class="text-xs text-gray-500 mt-1 text-right">3/7 hari</p>
                            </div>
                        </div>
                        <button class="mt-4 sm:mt-0 ml-auto sm:ml-0 flex-shrink-0 bg-green-500 hover:bg-green-600 text-white text-xs font-semibold py-1.5 px-3 rounded-md transition duration-150">
                            Perpanjang
                        </button>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 p-4 rounded-lg border border-gray-200 bg-gray-50">
                        <img src="https://placehold.co/100x150/dimgray/white?text=Buku+B" alt="Sampul Buku B" class="w-20 h-30 object-cover rounded-md flex-shrink-0">
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900">Buku Fiksi Fantasi Modern</h3>
                            <p class="text-sm text-gray-500 mb-1">Penulis B</p>
                            <p class="text-xs text-orange-500 font-medium">Jatuh tempo: 2 Juni 2025 (Sisa 1 hari)</p>
                             <div class="mt-2">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-red-500 h-2.5 rounded-full" style="width: 86%;"></div> </div>
                                <p class="text-xs text-gray-500 mt-1 text-right">6/7 hari</p>
                            </div>
                        </div>
                         <button class="mt-4 sm:mt-0 ml-auto sm:ml-0 flex-shrink-0 bg-gray-300 text-gray-700 text-xs font-semibold py-1.5 px-3 rounded-md cursor-not-allowed" disabled>
                            Kembalikan
                        </button>
                    </div>
                    
                    </div>
            </div>
        </section>

        <section>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">
                    Katalog Buku
                </h2>
                <div class="relative">
                    <input type="search" placeholder="Cari buku..." class="pl-10 pr-4 py-2 w-full sm:w-64 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/777/FFF?text=Buku+1" alt="Sampul Buku 1" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                            <a href="#">Petualangan di Negeri Awan</a>
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">Penulis Imajinatif</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                            Sebuah kisah epik tentang perjalanan melintasi daratan ajaib yang penuh dengan makhluk mitos dan teka-teki kuno.
                        </p>
                        <div class="mt-auto">
                            <a href="/transactions" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/666/FFF?text=Buku+2" alt="Sampul Buku 2" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                            <a href="#">Rahasia Dapur Nenek</a>
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">Chef Tradisional</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                            Kumpulan resep masakan warisan keluarga yang lezat dan mudah diikuti, lengkap dengan tips dan trik memasak.
                        </p>
                        <div class="mt-auto">
                             <span class="block w-full text-center bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md text-sm cursor-not-allowed">
                                Tidak Tersedia
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/555/FFF?text=Buku+3" alt="Sampul Buku 3" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                            <a href="#">Belajar Coding Cepat</a>
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">Programmer Handal</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                           Panduan praktis untuk pemula yang ingin menguasai dasar-dasar pemrograman dengan contoh kasus nyata.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                     <a href="#" class="block">
                        <img src="https://placehold.co/300x450/444/FFF?text=Buku+4" alt="Sampul Buku 4" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                           <a href="#">Misteri Hujan Meteor</a>
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">Pencerita Ulung</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                           Sebuah novel detektif yang menegangkan, mengikuti jejak seorang detektif dalam memecahkan kasus aneh.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>

                 <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                     <a href="#" class="block">
                        <img src="https://placehold.co/300x450/333/FFF?text=Buku+5" alt="Sampul Buku 5" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                           <a href="#">Seni Minimalis</a>
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">Guru Gaya Hidup</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                           Temukan kedamaian dan efisiensi dengan menerapkan prinsip-prinsip minimalis dalam kehidupan sehari-hari Anda.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
    
    <script>
        // Contoh sederhana jika Anda punya tombol dengan id="darkModeToggler"
        // const darkModeToggler = document.getElementById('darkModeToggler');
        // const htmlElement = document.documentElement;
        //
        // if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        //   htmlElement.classList.add('dark');
        // } else {
        //   htmlElement.classList.remove('dark');
        // }
        //
        // darkModeToggler?.addEventListener('click', () => {
        //   htmlElement.classList.toggle('dark');
        //   if (htmlElement.classList.contains('dark')) {
        //     localStorage.setItem('theme', 'dark');
        //   } else {
        //     localStorage.setItem('theme', 'light');
        //   }
        // });
    </script>
  </main>
</div>

</body>
</html>