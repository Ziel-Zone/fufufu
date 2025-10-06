<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Pastikan ini ada dan benar untuk memuat CSS dan JS dari Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> {{-- Font Awesome untuk ikon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> {{-- Flatpickr CSS --}}

  <title>Event & Kalender</title> {{-- Judul halaman ini --}}
</head>
<body class="h-full">
  <div class="min-h-full">
  {{-- INI KODE NAVIGASI DARI HALAMAN BOOK YANG SUDAH KITA PERBAIKI LOGIKA AKTIFNYA --}}
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
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Book</a>
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Transactions</a>
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Blog Feed</a>
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Event</a>
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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Event & Kalender</h1> {{-- Judul halaman ini --}}
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{-- Konten UNIK untuk halaman Event --}}
      <header class="mb-8">
          <h1 class="text-3xl font-bold text-gray-900">Event & Kalender Perpustakaan</h1>
          <p class="text-gray-600 mt-2">Ikuti terus acara menarik dan pantau tanggal pengembalian buku Anda.</p>
          @auth
            @if(Auth::user()->role === 'admin')
                <div class="mt-4">
                    <a href="{{ route('events.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus-circle mr-2"></i> Buat Event Baru
                    </a>
                </div>
            @endif
        @endauth
      </header>
      @php use Carbon\Carbon; @endphp
      <section class="mb-10">
          <h2 class="text-2xl font-semibold text-gray-900 mb-4">Acara Mendatang</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              @forelse ($events as $event)
                  <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                      <a href="#" class="block">
                          <img src="https://placehold.co/600x300/4f46e5/ffffff?text=Event+Perpustakaan" alt="{{ $event->title }}" class="w-full h-48 object-cover group-hover:opacity-90 transition-opacity">
                      </a>
                      <div class="p-4 flex flex-col flex-grow">
                          <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                              {{ $event->title }}
                          </h3>
                          <p class="text-sm text-gray-500 mb-2">
                              <i class="fas fa-calendar-alt mr-2"></i>
                              {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y H:i') }}
                          </p>
                          <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow">
                              {{ $event->description }}
                          </p>
                          <p class="text-sm text-gray-500 italic mb-3">
                              📍 Lokasi: {{ $event->location }}
                          </p>
                          <div class="mt-auto flex flex-wrap items-center justify-between gap-2">
                              <a href="#" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                  <i class="fas fa-info-circle mr-2"></i> Detail Acara
                              </a>

                              @auth
                                  @if (Auth::user()->role === 'admin')
                                      <div class="flex items-center space-x-2">
                                          <a href="{{ route('events.edit', $event->id) }}"
                                            class="inline-flex items-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-2 rounded">
                                              <i class="fas fa-edit mr-1"></i>Edit
                                          </a>
                                          <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit"
                                                      class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-2 rounded">
                                                  <i class="fas fa-trash mr-1"></i>Hapus
                                              </button>
                                          </form>
                                      </div>
                                  @endif
                              @endauth
                          </div>
                      </div>
                  </div>
              @empty
                  <p class="text-gray-500 col-span-full">Belum ada event yang tersedia.</p>
              @endforelse
          </div>
      </section>


      <section>
          <h2 class="text-2xl font-semibold text-gray-900 mb-4">Kalender Event & Pengembalian Buku</h2>
          <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 p-6">
              <div id="eventCalendar"></div>
          </div>
      </section>
    </div>
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> {{-- Flatpickr JS --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#eventCalendar", {
            inline: true,
            locale: "id", // Set bahasa ke Indonesia
            showMonths: 1,
            events: [
                {
                    from: "2025-06-05",
                    to: "2025-06-05",
                    name: "Pengembalian Buku: Judul Buku A",
                    color: "#dc2626", // Merah untuk pengembalian
                    textColor: "#ffffff"
                },
                {
                    from: "2025-06-12",
                    to: "2025-06-12",
                    name: "Pengembalian Buku: Buku Fiksi Fantasi Modern",
                    color: "#dc2626",
                    textColor: "#ffffff"
                },
                {
                    from: "2025-06-05",
                    to: "2025-06-05",
                    name: "Diskusi Buku Mingguan: Filosofi Teras",
                    color: "#4f46e5", // Biru untuk event
                    textColor: "#ffffff"
                },
                {
                    from: "2025-06-15",
                    to: "2025-06-15",
                    name: "Workshop Menulis Kreatif: Mengembangkan Karakter",
                    color: "#10b981", // Hijau untuk workshop
                    textColor: "#ffffff"
                },
                {
                    from: "2025-06-30",
                    to: "2025-06-30",
                    name: "Bedah Buku Bulanan: Homo Deus",
                    color: "#f59e0b", // Oranye untuk bedah buku
                    textColor: "#ffffff"
                },
                // Tambahkan event dan tanggal pengembalian buku lainnya di sini
            ],
            dayCreate: function(dObj, dStr, fp, dayElem) {
                // Tambahkan informasi event pada hari yang sesuai
                fp.config.events.forEach(event => {
                    const eventDate = new Date(event.from);
                    if (dObj.getDate() === eventDate.getDate() && dObj.getMonth() === eventDate.getMonth() && dObj.getFullYear() === eventDate.getFullYear()) {
                        const eventInfo = document.createElement("span");
                        eventInfo.className = "block mt-1 px-2 py-0.5 rounded text-xs font-semibold";
                        eventInfo.style.backgroundColor = event.color;
                        eventInfo.style.color = event.textColor;
                        eventInfo.textContent = event.name.length > 20 ? event.name.substring(0, 20) + "..." : event.name;
                        dayElem.appendChild(eventInfo);
                        dayElem.classList.add("relative", "overflow-hidden", "h-auto"); // Adjust height
                    }
                });
            }
        });
    });
</script>
</body>
</html>