<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <title>{{ $title ?? 'Blog Feed' }}</title>
</head>
<body class="h-full">
  <div class="min-h-full">
  {{-- KODE NAVIGASI YANG SAMA DENGAN HALAMAN LAIN --}}
  <nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="/" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}" 
                 aria-current="{{ request()->is('/') ? 'page' : 'false' }}">
                  Dashboard
              </a>

              <a href="/book" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('book') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Book
              </a>

              <a href="/transactions" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('transactions') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Transactions
              </a>

              <a href="/blogfeed" 
                 class="rounded-md px-3 py-2 text-sm font-medium 
                        {{ request()->is('blogfeed') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                  Blog Feed
              </a>

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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Blog Feed</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8" 
        x-data="blogData"> {{-- Menggunakan Alpine.data('blogData') --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Area Blog Utama (Kiri/Atas) --}}
            <div class="lg:col-span-2 bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 p-6 flex flex-col min-h-[60vh] relative overflow-hidden" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-x-full"
                 x-transition:enter-end="opacity-100 transform translate-x-0">
                <template x-if="selectedArticle">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-4" x-text="selectedArticle.title"></h2>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <span x-text="selectedArticle.author"></span>
                            <span class="mx-2">&bull;</span>
                            <span x-text="selectedArticle.published_at_formatted"></span>
                        </div>
                        <img x-show="selectedArticle.featured_image" :src="selectedArticle.featured_image" :alt="'Gambar Artikel ' + selectedArticle.title" class="w-full h-auto max-h-96 object-cover rounded-md mb-6">
                        <div class="prose max-w-none text-gray-700 leading-relaxed" x-html="selectedArticle.content"></div>
                        
                        {{-- GANTI SEMUA BLOK TOMBOL EDIT/HAPUS YANG LAMA DENGAN INI --}}
                        @auth
                        <div class="mt-6 flex items-center gap-x-4" x-show="selectedArticle">

                            {{-- Tombol Edit: HANYA untuk pemilik artikel --}}
                            <template x-if="selectedArticle && selectedArticle.user_id === {{ Auth::id() }}">
                                <a :href="'/articles/' + selectedArticle.id + '/edit'"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-200">
                                    Edit Artikel
                                </a>
                            </template>

                            {{-- Tombol Hapus: Untuk PEMILIK atau ADMIN --}}
                            <template x-if="selectedArticle && (selectedArticle.user_id === {{ Auth::id() }} || '{{ Auth::user()->role }}' === 'admin')">
                                <form :action="'/articles/' + selectedArticle.id + '/delete'" method="POST" x-data @submit.prevent="if (confirm('Anda yakin ingin menghapus artikel ini secara permanen?')) $el.submit()">
                                    @csrf
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-200">
                                        Hapus Artikel
                                    </button>
                                </form>
                            </template>

                        </div>
                        @endauth

                    </div>
                </template>
                <template x-if="!selectedArticle">
                    <div class="text-center text-gray-500 py-20 flex-grow flex flex-col items-center justify-center">
                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                        <p class="text-lg">Silakan pilih artikel dari daftar di samping untuk mulai membaca.</p>
                    </div>
                </template>
            </div>

            {{-- Sidebar (Kanan/Bawah) --}}
            <div x-show="showSidebar" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-x-full lg:translate-x-0"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-x-0"
                 x-transition:leave-end="opacity-0 transform translate-x-full lg:translate-x-0"
                 class="lg:col-span-1 bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 p-4 relative flex flex-col">
                
                {{-- Tombol Tutup Sidebar untuk Mobile --}}
                <button @click="showSidebar = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 lg:hidden">
                    <i class="fas fa-times-circle text-xl"></i>
                </button>

                {{-- Konten Sidebar: Daftar Artikel --}}
                <template x-if="sidebarContent === 'articles'">
                    <div class="flex-grow space-y-4 overflow-y-auto custom-scrollbar">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">Daftar Artikel</h3>
                        @forelse ($articles as $article)
                            {{-- DESAIN KARTU BLOG DI SIDEBAR --}}
                            <div @click="selectArticle({{ json_encode($article) }})" {{-- <<< PERUBAHAN KRITIS 1: Kirim objek $article --}}
                                class="bg-white border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50 transition-colors duration-200"
                                :class="{'bg-blue-50 border-blue-300': selectedArticle && selectedArticle.id === {{ $article['id'] }}}">
                                
                                {{-- Section 1: Photo Profile & Author --}}
                                <div class="flex items-center mb-2">
                                    <img src="https://via.placeholder.com/32x32/FFC107/FFFFFF?text=P" alt="Profile" class="size-8 rounded-full object-cover mr-2">
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-800" x-text="{{ json_encode($article['author']) }}"></h4> {{-- <<< PERUBAHAN KRITIS 2 --}}
                                        <p class="text-xs text-gray-500" x-text="formatDate({{ json_encode($article['published_at']) }})"></p> {{-- <<< PERUBAHAN KRITIS 3 --}}
                                    </div>
                                </div>

                                {{-- Section 2: Title --}}
                                <h5 class="text-md font-bold text-gray-900 leading-tight mb-2" x-text="{{ json_encode($article['title']) }}"></h5> {{-- <<< PERUBAHAN KRITIS 4 --}}
                                
                                {{-- Section 3: Like, Comment, Share --}}
                                <div class="flex items-center justify-between text-xs text-gray-500 mt-2 pt-2 border-t border-gray-100">
                                    <div class="flex space-x-3">
                                        <span class="inline-flex items-center" title="Suka">
                                            <i class="far fa-heart mr-1"></i> <span x-text="{{ json_encode($article['likes']) }}"></span> {{-- <<< PERUBAHAN KRITIS 5 --}}
                                        </span>
                                        <span class="inline-flex items-center" title="Komentar">
                                            <i class="far fa-comment mr-1"></i> <span x-text="{{ json_encode($article['comments']) }}"></span> {{-- <<< PERUBAHAN KRITIS 6 --}}
                                        </span>
                                    </div>
                                    <span class="inline-flex items-center" title="Bagikan">
                                        <i class="fas fa-share-alt"></i>
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-10">Tidak ada artikel untuk ditampilkan.</p>
                        @endforelse
                    </div>
                </template>

                {{-- Konten Sidebar: Komentar --}}
                <template x-if="sidebarContent === 'comments'">
                    <div class="flex-grow space-y-4 overflow-y-auto custom-scrollbar">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">Komentar</h3>
                        
                        <template x-if="selectedArticle && commentsData.filter(comment => comment.article_id === selectedArticle.id).length > 0">
                            <template x-for="comment in commentsData.filter(comment => comment.article_id === selectedArticle.id)" :key="comment.body + comment.author">
                                <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                                    <h4 class="text-sm font-semibold text-gray-800" x-text="comment.author"></h4>
                                    <p class="text-xs text-gray-500" x-text="comment.published_at_formatted"></p>
                                    <p class="text-sm text-gray-700 mt-2" x-text="comment.body"></p>
                                </div>
                            </template>
                        </template>
                        <template x-if="!selectedArticle">
                             <p class="text-center text-gray-500">Pilih artikel untuk melihat komentarnya.</p>
                        </template>
                        <template x-if="selectedArticle && commentsData.filter(comment => comment.article_id === selectedArticle.id).length === 0">
                            <p class="text-center text-gray-500">Belum ada komentar untuk artikel ini.</p>
                        </template>

                        {{-- Formulir Input Komentar --}}
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 mt-4"> {{-- mt-4 for spacing --}}
                            <h4 class="font-semibold text-gray-800 mb-2">Tulis Komentar</h4>
                            <form @submit.prevent="addComment()" class="space-y-3">
                                <div>
                                    <label for="commentAuthor" class="sr-only">Nama Anda</label>
                                    <input type="text" id="commentAuthor" x-model="newComment.author" placeholder="Nama Anda" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div>
                                    <label for="commentBody" class="sr-only">Komentar Anda</label>
                                    <textarea id="commentBody" x-model="newComment.body" placeholder="Tulis komentar Anda..." rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">Kirim Komentar</button>
                            </form>
                        </div>
                    </div>
                </template>

                {{-- Button Tambah di Desktop (sesuai Figma) --}}
                <a href="/write" 
                   class="hidden lg:block mt-6 w-full text-center px-4 py-3 border border-transparent text-lg font-medium rounded-md shadow-sm text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Artikel
                </a>

            </div>
        </div>

        {{-- Button Navigasi Bawah (Fixed untuk Mobile, Static untuk Desktop) --}}
        <div class="fixed bottom-0 left-0 right-0 bg-white shadow-xl p-4 flex justify-around sm:justify-center space-x-4 border-t border-gray-200 lg:static lg:mt-6 lg:rounded-xl">
            {{-- Tombol Search/Kembali ke Kartu (Mobile: Open Sidebar; Desktop: Toggle Sidebar if already open) --}}
            <button @click="showSidebar = true; sidebarContent = 'articles';" 
                    class="flex-1 sm:flex-none inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <i class="fas fa-list-alt mr-2 sm:mr-0 lg:mr-2"></i> 
                <span class="sm:hidden lg:inline">Daftar Artikel</span>
            </button>

            {{-- Tombol Buat Artikel (Hanya Mobile) --}}
            <a href="/write" 
               class="flex-1 sm:flex-none inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 lg:hidden"> {{-- lg:hidden untuk menyembunyikan di desktop --}}
                <i class="fas fa-plus-circle mr-2 sm:mr-0 lg:mr-2"></i> 
                <span class="sm:hidden lg:inline">Buat Artikel</span>
            </a>

            {{-- Tombol Lihat Komentar --}}
            <button @click="showSidebar = true; sidebarContent = 'comments';" 
                    class="flex-1 sm:flex-none inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <i class="fas fa-comments mr-2 sm:mr-0 lg:mr-2"></i> 
                <span class="sm:hidden lg:inline">Lihat Komentar</span>
            </button>
        </div>

    </div>
  </main>
</div>

{{-- Alpine.js Data dan Logika --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('blogData', () => ({
            articles: @json($articles),
            commentsData: @json($comments), 
            selectedArticle: null,
            showSidebar: true, 
            sidebarContent: 'articles', 

            newComment: { 
                author: '',
                body: '',
            },

            init() {
                this.articles = this.articles.map(article => ({
                    ...article,
                    published_at_formatted: this.formatDate(article.published_at),
                }));
                this.commentsData = this.commentsData.map(comment => ({
                    ...comment,
                    published_at_formatted: this.formatDate(comment.published_at),
                }));

                if (this.articles.length > 0 && !this.selectedArticle) {
                    this.selectedArticle = this.articles[0];
                }

                if (window.innerWidth < 1024) { 
                    this.showSidebar = false;
                }
            },

            formatDate(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('id-ID', options);
            },
            
            selectArticle(article) {
                this.selectedArticle = article;
                if (window.innerWidth < 1024) { 
                    this.showSidebar = false;
                }
            },

            addComment() {
                if (!this.newComment.author.trim() || !this.newComment.body.trim() || !this.selectedArticle) {
                    alert('Nama dan komentar tidak boleh kosong, dan harus ada artikel yang terpilih.');
                    return;
                }

                const newC = {
                    article_id: this.selectedArticle.id,
                    author: this.newComment.author.trim(),
                    body: this.newComment.body.trim(),
                    published_at: new Date().toISOString(), 
                    published_at_formatted: this.formatDate(new Date().toISOString()),
                };

                this.commentsData.push(newC);

                if (this.selectedArticle) {
                    const articleIndex = this.articles.findIndex(art => art.id === this.selectedArticle.id);
                    if (articleIndex !== -1) {
                        this.articles[articleIndex].comments++; 
                    }
                }

                this.newComment.author = '';
                this.newComment.body = '';
            },
        }));
    });
</script>

<style>
    /* Custom Scrollbar for better UX */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    html.dark .custom-scrollbar::-webkit-scrollbar-track {
        background: theme('colors.gray.700');
    }
    html.dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: theme('colors.gray.500');
    }
    html.dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: theme('colors.gray.400');
    }

    /* Untuk line-clamp, jika belum diatur di tailwind.config.js */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Styling untuk konten blog lengkap (x-html="selectedArticle.content") */
    .prose {
        font-size: 1rem;
        line-height: 1.75;
        color: theme('colors.gray.700');
    }
    .prose h1, .prose h2, .prose h3, .prose h4 {
        margin-top: 1.5em;
        margin-bottom: 0.5em;
        font-weight: 700;
        line-height: 1.25;
        color: theme('colors.gray.900');
    }
    .prose p {
        margin-bottom: 1.25em;
    }
    .prose ol, .prose ul {
        margin-bottom: 1.25em;
        padding-left: 1.5em;
    }
    .prose ol > li, .prose ul > li {
        margin-bottom: 0.5em;
    }
    .prose a {
        color: theme('colors.blue.600');
        text-decoration: underline;
    }
    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: theme('borderRadius.md');
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>

</body>
</html>