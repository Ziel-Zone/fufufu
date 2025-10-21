<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event & Kalender - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        // Jika Anda menggunakan font kustom
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bdd7fa',
                            300: '#9ec5f4',
                            400: '#7aa2f2',
                            500: '#6366f1',
                            600: '#5661b3',
                            700: '#444a7a',
                            800: '#312e4d',
                            900: '#1e1b2b',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        /* Style tambahan untuk kalender */
        .flatpickr-calendar {
            background: theme('colors.white');
            border: 1px solid theme('colors.gray.200');
            box-shadow: theme('boxShadow.md');
            border-radius: theme('borderRadius.md');
            overflow: hidden;
            font-size: theme('fontSize.sm');
        }
        .dark .flatpickr-calendar {
            background: theme('colors.gray.800');
            border-color: theme('colors.gray.700');
            box-shadow: theme('boxShadow.lg');
        }
        .flatpickr-day {
            color: theme('colors.gray.700');
        }
        .dark .flatpickr-day {
            color: theme('colors.gray.300');
        }
        .flatpickr-day.today {
            border-color: theme('colors.primary.500');
            color: theme('colors.primary.500');
            font-weight: 500;
        }
        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.inRange {
            background: theme('colors.primary.500');
            color: theme('colors.white');
            border-radius: 0;
        }
        .flatpickr-day:hover {
            background: theme('colors.gray.100');
        }
        .dark .flatpickr-day:hover {
            background: theme('colors.gray.700');
        }
        .flatpickr-months .flatpickr-month {
            color: theme('colors.gray.900');
        }
        .dark .flatpickr-months .flatpickr-month {
            color: theme('colors.gray.100');
        }
        .flatpickr-weekday {
            color: theme('colors.gray.500');
        }
        .dark .flatpickr-weekday {
            color: theme('colors.gray.400');
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Event & Kalender Perpustakaan</h1>
            <p class="text-gray-600 mt-2">Ikuti terus acara menarik dan pantau tanggal pengembalian buku Anda.</p>
        </header>

        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Acara Mendatang</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/600x300/4f46e5/ffffff?text=Diskusi+Buku+Mingguan" alt="Diskusi Buku Mingguan" class="w-full h-48 object-cover group-hover:opacity-90 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            <a href="#">Diskusi Buku Mingguan: "Filosofi Teras"</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-2"><i class="fas fa-calendar-alt mr-2"></i> Setiap Rabu, 19:00 WIB</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow">
                            Mari bergabung dalam diskusi santai namun mendalam mengenai buku "Filosofi Teras" karya Henry Manampiring.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                <i class="fas fa-info-circle mr-2"></i> Detail Acara
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/600x300/10b981/ffffff?text=Workshop+Menulis+Kreatif" alt="Workshop Menulis Kreatif" class="w-full h-48 object-cover group-hover:opacity-90 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            <a href="#">Workshop Menulis Kreatif: Mengembangkan Karakter</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-2"><i class="fas fa-calendar-alt mr-2"></i> Sabtu, 15 Juni 2025, 10:00 - 12:00 WIB</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow">
                            Ikuti workshop intensif tentang cara mengembangkan karakter yang kuat dan menarik dalam cerita Anda.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                <i class="fas fa-sign-in-alt mr-2"></i> Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 overflow-hidden flex flex-col group">
                    <a href="#" class="block">
                        <img src="https://placehold.co/600x300/f59e0b/ffffff?text=Sesi+Bedah+Buku+Bulanan" alt="Sesi Bedah Buku Bulanan" class="w-full h-48 object-cover group-hover:opacity-90 transition-opacity">
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            <a href="#">Bedah Buku Bulanan: "Homo Deus"</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-2"><i class="fas fa-calendar-alt mr-2"></i> Minggu, 30 Juni 2025, 14:00 WIB</p>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3 flex-grow">
                            Mari kita telaah bersama ide-ide provokatif dalam buku "Homo Deus" karya Yuval Noah Harari.
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
                                <i class="fas fa-book-open mr-2"></i> Ikuti Bedah Buku
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Kalender Event & Pengembalian Buku</h2>
            <div class="bg-white backdrop-blur-sm shadow-lg rounded-xl border border-gray-200 p-6">
                <div id="eventCalendar"></div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
</x-layout>