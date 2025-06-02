<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!DOCTYPE html>
<html lang="id" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Peminjaman - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    // Tambahkan kustomisasi tema Anda di sini jika ada
                }
            }
        }
    </script>
    <style>
        /* Smooth transition for dropdown */
        .details-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        details[open] .details-content {
            max-height: 1000px; /* Cukup besar untuk menampung konten */
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white antialiased">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Transaksi Peminjaman Anda</h1>
        </header>

        <section class="mb-10">
            <details class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <summary class="p-6 cursor-pointer flex justify-between items-center list-none">
                    <h2 class="text-xl font-semibold">Buat Permintaan Peminjaman Baru</h2>
                    <span class="text-gray-500 dark:text-gray-400 transform transition-transform duration-300">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </summary>
                <div class="details-content p-6 border-t border-gray-200 dark:border-gray-700">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="book_title_request" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Buku / ISBN</label>
                            <input type="text" name="book_title_request" id="book_title_request" placeholder="Masukkan judul buku atau ISBN" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm" required>
                        </div>
                        <div>
                            <label for="borrow_date_request" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Peminjaman yang Diinginkan</label>
                            <input type="date" name="borrow_date_request" id="borrow_date_request" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm" required>
                        </div>
                        <div>
                            <label for="borrow_duration_request" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Durasi Peminjaman (maks. 7 hari)</label>
                            <select name="borrow_duration_request" id="borrow_duration_request" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm" required>
                                <option value="3">3 Hari</option>
                                <option value="5">5 Hari</option>
                                <option value="7" selected>7 Hari</option>
                            </select>
                        </div>
                        <div>
                            <label for="notes_request" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Catatan Tambahan (Opsional)</label>
                            <textarea name="notes_request" id="notes_request" rows="3" placeholder="Misalnya: Edisi tertentu, dll." class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-150 ease-in-out">
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </details>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Status Permintaan Peminjaman</h2>
            <div class="space-y-4">
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-md rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">"Belajar Laravel dari Awal"</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Diajukan pada: 28 Mei 2025</p>
                        </div>
                        <span class="mt-2 sm:mt-0 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                            <i class="fas fa-check-circle mr-1.5"></i> Diizinkan
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Silakan ambil buku di perpustakaan sebelum tanggal 3 Juni 2025.</p>
                </div>

                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-md rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">"Sejarah Dunia yang Disembunyikan"</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Diajukan pada: 29 Mei 2025</p>
                        </div>
                        <span class="mt-2 sm:mt-0 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100">
                            <i class="fas fa-times-circle mr-1.5"></i> Ditolak
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Alasan: Buku sedang dipinjam oleh pengguna lain, perkiraan tersedia 10 Juni 2025.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-md rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">"Pengantar Kecerdasan Buatan"</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Diajukan pada: 1 Juni 2025</p>
                        </div>
                        <span class="mt-2 sm:mt-0 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-600 dark:text-yellow-100">
                           <i class="fas fa-hourglass-half mr-1.5"></i> Menunggu Persetujuan
                        </span>
                    </div>
                     <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Permintaan Anda sedang diproses oleh petugas perpustakaan.</p>
                </div>
            </div>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Informasi Denda</h2>
            <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow-md rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                <p class="text-gray-600 dark:text-gray-300">🎉 Anda tidak memiliki denda saat ini. Terima kasih telah tertib!</p>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Statistik Peminjaman Anda</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow rounded-lg border border-gray-200 dark:border-gray-700 p-5 text-center">
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">12</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Buku Dipinjam</p>
                </div>
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow rounded-lg border border-gray-200 dark:border-gray-700 p-5 text-center">
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">2</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Sedang Dipinjam</p>
                </div>
                <div class="bg-white dark:bg-gray-800/70 backdrop-blur-sm shadow rounded-lg border border-gray-200 dark:border-gray-700 p-5 text-center">
                    <p class="text-3xl font-bold text-gray-700 dark:text-gray-300">95%</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Tingkat Pengembalian Tepat Waktu</p>
                </div>
            </div>
        </section>

    </div>

    <script>
        // Script untuk ikon chevron pada dropdown/details
        const detailsElements = document.querySelectorAll('details');
        detailsElements.forEach(details => {
            const summary = details.querySelector('summary');
            const icon = summary.querySelector('i.fa-chevron-down');
            details.addEventListener('toggle', () => {
                if (details.open) {
                    icon.classList.add('rotate-180');
                } else {
                    icon.classList.remove('rotate-180');
                }
            });
        });
    </script>

</body>
</html>
</x-layout>