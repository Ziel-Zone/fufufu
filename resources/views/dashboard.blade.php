<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <!-- component -->
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
                      <a href="/books" class="block w-full h-full p-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl flex items-center justify-center"> 
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
</x-layout>