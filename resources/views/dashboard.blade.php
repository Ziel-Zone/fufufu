<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{-- Hapus baris <link href="/src/styles.css" rel="stylesheet"> --}}
  {{-- Dan ganti dengan directive @vite ini: --}}
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>Dashboard</title>
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
        <div class="-mr-2 flex md:hidden">
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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>
  <main>
    <section>
    <div class="pt-3 pb-16">
        <div class="mx-auto px-6 max-w-6xl text-gray-500">
            <div class="relative">
                <div class="relative z-10 grid gap-3 grid-cols-6">
                  <!-- first box -->
                    <div class="col-span-full lg:col-span-2 overflow-hidden relative rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900 group">
                        <a href="/transactions" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex items-center justify-center"> 
                            <div class="size-fit relative text-center"> <div class="relative h-24 w-56 mx-auto flex items-center"> <img src="/Images/ADD X.svg" 
                                        alt="Ikon Kustom" 
                                        class="absolute inset-0 size-full object-contain text-blue-500 dark:text-red-500">
                                </div>
                                <h2 class="mt-6 text-center font-semibold text-gray-950 dark:text-white text-3xl group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Borrow</h2>
                            </div>
                        </a>
                    </div>
                    <!-- first box -->

                    <!-- second box -->
                    <div class="col-span-full sm:col-span-3 lg:col-span-2 overflow-hidden relative rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900 group">
                      <a href="/book" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex items-center justify-center"> 
                          <div class="size-fit relative text-center"> <div class="relative h-24 w-56 mx-auto flex items-center"> <img src="/Images/Book.svg" 
                                      alt="Ikon Kustom" 
                                      class="absolute inset-0 size-full object-contain text-blue-500 dark:text-red-500">
                              </div>
                              <h2 class="mt-6 text-center font-semibold text-gray-950 dark:text-white text-3xl group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Your Book</h2>
                          </div>
                      </a>
                  </div>
                    <!-- second box -->

                    <!-- Third box -->
                    <div class="col-span-full sm:col-span-3 lg:col-span-2 overflow-hidden relative rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900 group">
                      <a href="/blogfeed" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex items-center justify-center"> 
                          <div class="size-fit relative text-center"> <div class="relative h-24 w-56 mx-auto flex items-center"> <img src="/Images/Write.svg" 
                                      alt="Ikon Kustom" 
                                      class="absolute inset-0 size-full object-contain text-blue-500 dark:text-red-500">
                              </div>
                              <h2 class="mt-6 text-center font-semibold text-gray-950 dark:text-white text-3xl group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Write</h2>
                          </div>
                      </a>
                  </div>
                    <!-- Third box -->

                    <!-- Fourth box -->
                    <div class="col-span-full lg:col-span-3 overflow-hidden relative rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900 group">
                      <a href="/blogfeed" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex flex-col"> 
                          <div class="flex flex-col space-y-4 h-full"> 
                              <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                  Blog
                              </h3>
                              <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white font-handwriting group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"> 
                                  Memahami Nietzche dalam buku Thus Spoke Zarathustra
                              </h2>
                              <p class="text-gray-600 dark:text-gray-300 font-sans text-base leading-relaxed flex-grow"> 
                                  Menjadi diri sendiri adalah tantangan bagi siapapun. itu paradox yang aneh sekaligus indah karena dalam level dangkal seseorang bisa mengakui siapa dirinya. namun dalam level lebih dalam ini adalah penaklukan atas diri sendiri. bukan pengakuan. tapi bagaimana seseorang meraihnya.
                              </p>
                              <span class="inline-block mt-auto pt-2 text-blue-600 dark:text-blue-400 group-hover:underline font-medium">
                                  Baca Selengkapnya &rarr;
                              </span>
                          </div>
                      </a>
                  </div>
                    <!-- Fourth box -->

                    <!-- Fifth box -->
                    <div class="col-span-full lg:col-span-3 overflow-hidden relative rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900 group">
                          <a href="/event" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex flex-col">
                              <div class="flex flex-col h-full"> <div class="mb-3 self-start"> 
                                      <span class="inline-block bg-teal-100 text-teal-700 dark:bg-teal-700 dark:text-teal-100 px-3 py-1 text-xs font-semibold rounded-full uppercase tracking-wider group-hover:bg-teal-200 dark:group-hover:bg-teal-600 transition-colors">
                                          Event
                                      </span>
                                  </div>
                                  <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-indigo-700 dark:group-hover:text-indigo-300 transition-colors">
                                      Weekly Book Discussion
                                  </h2>
                                  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                      <p class="flex items-center">
                                          <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                          Setiap Sabtu, Pukul 16:00 - 17:30 WIB
                                      </p>
                                      <p class="flex items-center">
                                          <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                                          Perpustakaan Kampus Fakultas Komunikasi dan Informasi
                                      </p>
                                  </div>
                                  <p class="text-gray-700 dark:text-gray-300 text-base leading-relaxed mb-6 flex-grow">
                                      Bergabunglah dengan kami setiap minggu untuk diskusi buku yang mendalam dan mencerahkan! Kita akan membahas berbagai judul menarik, berbagi wawasan, dan memperluas cakrawala literasi bersama. Terbuka untuk semua pecinta buku!
                                  </p>
                                  <div class="mt-auto"> 
                                      <span class="block w-full text-center bg-blue-600 group-hover:bg-blue-700 text-white font-semibold py-3 px-5 rounded-lg transition duration-150 ease-in-out">
                                          Gabung Diskusi
                                      </span>
                                  </div>
                              </div>
                          </a>
                      </div>
                      <!-- fifth box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  </main>
</div>

</body>
</html>