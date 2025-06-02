<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class', // atau 'media'
            theme: {
                extend: {
                    fontFamily: {
                        // Jika Anda menggunakan font kustom seperti di dashboard
                        // 'sans': ['Inter', 'sans-serif'], 
                        // 'handwriting': ['Pacifico', 'cursive'], 
                    },
                }
            }
        }
    </script>
    <style>
        /* Tambahkan style kustom di sini jika ada, misalnya untuk scrollbar atau efek tertentu */
        body {
            /* Ganti dengan font default Anda jika ada */
            /* font-family: 'Inter', sans-serif; */
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 antialiased">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <section class="mb-12">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                Buku Pinjaman Anda
            </h1>
            <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                        <img src="https://placehold.co/100x150/gray/white?text=Buku+A" alt="Sampul Buku A" class="w-20 h-30 object-cover rounded-md flex-shrink-0">
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Buku Pinjaman A</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Penulis A</p>
                            <p class="text-xs text-red-600 dark:text-red-400 font-medium">Jatuh tempo: 5 Juni 2025 (Sisa 4 hari)</p>
                            <div class="mt-2">
                                <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 43%;"></div> </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 text-right">3/7 hari</p>
                            </div>
                        </div>
                        <button class="mt-4 sm:mt-0 ml-auto sm:ml-0 flex-shrink-0 bg-green-500 hover:bg-green-600 text-white text-xs font-semibold py-1.5 px-3 rounded-md transition duration-150">
                            Perpanjang
                        </button>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                        <img src="https://placehold.co/100x150/dimgray/white?text=Buku+B" alt="Sampul Buku B" class="w-20 h-30 object-cover rounded-md flex-shrink-0">
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Buku Fiksi Fantasi Modern</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Penulis B</p>
                            <p class="text-xs text-orange-500 dark:text-orange-400 font-medium">Jatuh tempo: 2 Juni 2025 (Sisa 1 hari)</p>
                             <div class="mt-2">
                                <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2.5">
                                    <div class="bg-red-500 h-2.5 rounded-full" style="width: 86%;"></div> </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 text-right">6/7 hari</p>
                            </div>
                        </div>
                         <button class="mt-4 sm:mt-0 ml-auto sm:ml-0 flex-shrink-0 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-200 text-xs font-semibold py-1.5 px-3 rounded-md cursor-not-allowed" disabled>
                            Kembalikan
                        </button>
                    </div>
                    
                    </div>
            </div>
        </section>

        <section>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Katalog Buku
                </h2>
                <div class="relative">
                    <input type="search" placeholder="Cari buku..." class="pl-10 pr-4 py-2 w-full sm:w-64 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 text-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/777/FFF?text=Buku+1" alt="Sampul Buku 1" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            <a href="#">Petualangan di Negeri Awan</a>
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Penulis Imajinatif</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                            Sebuah kisah epik tentang perjalanan melintasi daratan ajaib yang penuh dengan makhluk mitos dan teka-teki kuno.
                        </p>
                        <div class="mt-auto">
                            <a href="/transactions" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/666/FFF?text=Buku+2" alt="Sampul Buku 2" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            <a href="#">Rahasia Dapur Nenek</a>
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Chef Tradisional</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                            Kumpulan resep masakan warisan keluarga yang lezat dan mudah diikuti, lengkap dengan tips dan trik memasak.
                        </p>
                        <div class="mt-auto">
                             <span class="block w-full text-center bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium py-2 px-4 rounded-md text-sm cursor-not-allowed">
                                Tidak Tersedia
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/300x450/555/FFF?text=Buku+3" alt="Sampul Buku 3" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            <a href="#">Belajar Coding Cepat</a>
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Programmer Handal</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                           Panduan praktis untuk pemula yang ingin menguasai dasar-dasar pemrograman dengan contoh kasus nyata.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col group">
                     <a href="#" class="block">
                        <img src="https://placehold.co/300x450/444/FFF?text=Buku+4" alt="Sampul Buku 4" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                           <a href="#">Misteri Hujan Meteor</a>
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Pencerita Ulung</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
                           Sebuah novel detektif yang menegangkan, mengikuti jejak seorang detektif dalam memecahkan kasus aneh.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                </div>

                 <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col group">
                     <a href="#" class="block">
                        <img src="https://placehold.co/300x450/333/FFF?text=Buku+5" alt="Sampul Buku 5" class="w-full h-64 object-cover group-hover:opacity-80 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-md font-semibold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                           <a href="#">Seni Minimalis</a>
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Guru Gaya Hidup</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-3 flex-grow text-ellipsis overflow-hidden max-h-20">
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

</body>
</html>
</x-layout>