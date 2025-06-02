<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Feed - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        // Jika ada font kustom
                    }
                }
            }
        }
    </script>
    <style>
        /* Style kustom tambahan */
        .blog-card {
            border: 1px solid theme('colors.gray.200');
            border-radius: theme('borderRadius.md');
            background-color: theme('colors.white');
        }
        .dark .blog-card {
            border-color: theme('colors.gray.700');
            background-color: theme('colors.gray.800');
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white antialiased">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Blog Feed</h1>
            <p class="text-gray-600 dark:text-gray-400">Baca tulisan terbaru dari komunitas perpustakaan.</p>
        </header>

        <main id="blogFeedContainer" class="space-y-6">

            </main>

        <div id="loadingIndicator" class="text-center py-4 text-gray-500 dark:text-gray-400 hidden">
            <i class="fas fa-spinner fa-spin mr-2"></i> Memuat lebih banyak...
        </div>
    </div>

    <script>
        const blogFeedContainer = document.getElementById('blogFeedContainer');
        const loadingIndicator = document.getElementById('loadingIndicator');
        let page = 1; // Untuk simulasi pagination
        const postsPerPage = 5; // Jumlah post per load
        let loading = false;
        let allPostsLoaded = false;

        async function fetchBlogPosts(page) {
            if (loading || allPostsLoaded) return;
            loadingIndicator.classList.remove('hidden');
            loading = true;

            // Simulasi fetching data dari API (ganti dengan implementasi backend Anda)
            return new Promise(resolve => {
                setTimeout(() => {
                    const dummyPosts = generateDummyPosts(page, postsPerPage);
                    if (dummyPosts.length === 0) {
                        allPostsLoaded = true;
                        loadingIndicator.textContent = 'Tidak ada lagi konten untuk dimuat.';
                    } else {
                        resolve(dummyPosts);
                    }
                    loadingIndicator.classList.add('hidden');
                    loading = false;
                }, 1000);
            });
        }

        function generateDummyPosts(page, postsPerPage) {
            const startIndex = (page - 1) * postsPerPage;
            const endIndex = startIndex + postsPerPage;
            const posts = [];
            for (let i = startIndex; i < endIndex; i++) {
                posts.push({
                    author: `Author ${i + 1}`,
                    profileImage: `https://placehold.co/40x40/${Math.floor(Math.random() * 999)}/fff?text=${String.fromCharCode(65 + (i % 26))}`,
                    headlineImage: `https://placehold.co/600x600/${Math.floor(Math.random() * 999)}/eee?text=Post+${i + 1}`,
                    title: `Judul Blog Post ke-${i + 1} yang Sangat Kreatif dan Menarik`,
                    synopsis: `Ini adalah sinopsis singkat untuk blog post ke-${i + 1}. Isinya mungkin tentang petualangan seru, tips bermanfaat, atau renungan mendalam.`,
                    likes: Math.floor(Math.random() * 500),
                    comments: Math.floor(Math.random() * 100)
                });
            }
            return posts;
        }

        function renderBlogPost(post) {
            const postElement = document.createElement('div');
            // Kartu utama menjadi flex column untuk mengatur posisi footer dengan mt-auto
            postElement.className = 'blog-card shadow-md rounded-md flex flex-col overflow-hidden'; 

            // Seluruh kartu adalah link ke halaman artikel detail
            // Ganti "/artikel-detail-page.html?id=${post.id}" dengan path route Laravel Anda, misal "/artikel/${post.slug}" atau "/artikel/${post.id}"
            const linkElement = document.createElement('a');
            linkElement.href = '/artikel/{id}' // Placeholder, sesuaikan dengan routing Laravel Anda
            linkElement.className = 'block p-4 flex flex-col flex-grow group focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-md'; // p-4 padding untuk konten di dalam link

            linkElement.innerHTML = `
                <div class="mb-3">
                    <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">${post.author}</h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${post.timestamp || 'Beberapa waktu lalu'}</p>
                </div>

                <div class="flex-grow"> <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">${post.title}</h2>
                    <p class="text-gray-700 dark:text-gray-300 text-base leading-relaxed line-clamp-3 sm:line-clamp-4 group-hover:text-gray-800 dark:group-hover:text-gray-200 transition-colors">
                        ${post.synopsis}
                    </p>
                </div>

                <div class="mt-4 pt-3 border-t border-gray-200 dark:border-gray-700">
                    ${post.userCaption ? `
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 italic">
                        ${post.userCaption}
                    </p>` : ''}
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-3 sm:space-x-4">
                            <span class="inline-flex items-center text-gray-500 dark:text-gray-400" title="Suka">
                                <i class="far fa-heart mr-1 text-sm sm:text-base"></i> 
                                <span class="text-xs sm:text-sm">${post.likes}</span>
                            </span>
                            <span class="inline-flex items-center text-gray-500 dark:text-gray-400" title="Komentar">
                                <i class="far fa-comment mr-1 text-sm sm:text-base"></i>
                                <span class="text-xs sm:text-sm">${post.comments}</span>
                            </span>
                        </div>
                        <span class="inline-flex items-center text-gray-500 dark:text-gray-400" title="Bagikan">
                            <i class="fas fa-share-alt text-sm sm:text-base"></i>
                        </span>
                    </div>
                </div>
            `;
            postElement.appendChild(linkElement); // Tambahkan link yang berisi konten ke dalam div kartu
            blogFeedContainer.appendChild(postElement);
        }

        // Pastikan generateDummyPosts menyediakan data yang relevan (tanpa gambar utama jika tidak perlu)
        // Dan tambahkan 'id' atau 'slug' untuk link ke artikel detail
        function generateDummyPosts(page, postsPerPage) {
            const startIndex = (page - 1) * postsPerPage;
            const endIndex = startIndex + postsPerPage;
            const posts = [];
            // ... (isi dengan data dummy seperti sebelumnya, tapi mungkin tanpa 'headlineImage' atau 'profileImage' jika benar-benar text-only)
            // Contoh penambahan id:
            for (let i = startIndex; i < endIndex; i++) {
                if (i >= 25) { 
                    allPostsLoaded = true; 
                    break;
                }
                posts.push({
                    id: `artikel-${i + 1}`, // ID unik untuk artikel
                    slug: `judul-blog-post-ke-${i + 1}-yang-sangat-kreatif`, // atau slug
                    author: `Pena Tajam ${String.fromCharCode(65 + (i % 7))}`,
                    // profileImage: (opsional, jika masih mau ada avatar kecil) `https://i.pravatar.cc/40?u=author${i % 7}`,
                    title: `Refleksi Literasi Bagian ${i + 1}`,
                    synopsis: `Ini adalah eksplorasi mendalam tentang makna literasi di era digital, bagaimana kita berinteraksi dengan teks, dan dampaknya pada pemahaman kolektif kita. Sebuah perenungan bagi ${i + 1} insan pembelajar.`,
                    userCaption: (i % 3 === 0) ? `Catatan singkat dariku untuk direnungkan bersama.` : null,
                    likes: Math.floor(Math.random() * 120) + 5,
                    comments: Math.floor(Math.random() * 30) + 2,
                    timestamp: `${Math.floor(Math.random() * 5) + 1} hari yang lalu`
                });
            }
            return posts;
        }

        // ... (Sisa kode JavaScript untuk fetchBlogPosts, loadMorePosts, checkScroll, dan initial load tetap sama)
        // Pastikan di fetchBlogPosts, Anda menangani kondisi allPostsLoaded dengan benar
        async function fetchBlogPosts(page) {
            if (loading || allPostsLoaded) return Promise.resolve([]);
            loadingIndicator.classList.remove('hidden');
            loading = true;

            return new Promise(resolve => {
                setTimeout(() => {
                    const dummyPosts = generateDummyPosts(page, postsPerPage);
                    if (dummyPosts.length === 0) {
                        allPostsLoaded = true;
                        loadingIndicator.textContent = 'Semua tulisan telah ditampilkan.';
                    } else {
                        loadingIndicator.classList.add('hidden');
                    }
                    resolve(dummyPosts);
                    loading = false;
                    if(allPostsLoaded && dummyPosts.length > 0){ // Jaga agar indikator tidak hilang jika masih ada post terakhir
                        loadingIndicator.classList.add('hidden');
                    } else if (allPostsLoaded && dummyPosts.length === 0) {
                        loadingIndicator.classList.remove('hidden'); // Tampilkan pesan akhir
                    }
                }, 1000);
            });
        }
        // (kode loadMorePosts, checkScroll, initial load, event listener scroll Anda)
        // (Pastikan kode ini ada setelah deklarasi fungsi di atas)
        async function loadMorePosts() {
            if (loading || allPostsLoaded) return;
            page++;
            const newPosts = await fetchBlogPosts(page);
            if (newPosts && newPosts.length > 0) {
                newPosts.forEach(renderBlogPost);
            }
        }

        function checkScroll() {
            const lastPost = blogFeedContainer.lastElementChild;
            if (lastPost && !loading && !allPostsLoaded) { // Tambah cek !loading dan !allPostsLoaded
                const lastPostBottom = lastPost.getBoundingClientRect().bottom;
                const viewportBottom = window.innerHeight || document.documentElement.clientHeight;
                if (lastPostBottom <= viewportBottom + 300) {
                    loadMorePosts();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchBlogPosts(page).then(posts => {
                if (posts && posts.length > 0) {
                    posts.forEach(renderBlogPost);
                } else if (posts && posts.length === 0 && page === 1) {
                    if(loadingIndicator) loadingIndicator.textContent = 'Belum ada tulisan untuk ditampilkan.';
                    if(loadingIndicator) loadingIndicator.classList.remove('hidden');
                }
            });
            window.addEventListener('scroll', checkScroll);
        });
    </script>
</body>
</html>
</x-layout>