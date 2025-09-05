<x-layouts.front>

    {{-- Banner Slider --}}
    <section>
        <div id="default-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="3000">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/img-1.jpg') }}"
                         class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="Banner 1">

                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-200/40 via-yellow-500/10 to-transparent"></div>

                    <!-- Title -->
                    <div class="absolute bottom-6 left-6 text-left">
                        <h2 class="text-white text-2xl md:text-4xl font-bold drop-shadow">
                            Judul Banner 1
                        </h2>
                        <p class="text-white/80 mt-2 text-sm md:text-base">
                            Deskripsi singkat untuk banner pertama.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/img-2.jpg') }}"
                         class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="Banner 2">

                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-200/40 via-yellow-500/10 to-transparent"></div>


                    <!-- Title -->
                    <div class="absolute bottom-6 left-6 text-left">
                        <h2 class="text-white text-2xl md:text-4xl font-bold drop-shadow">
                            Judul Banner 2
                        </h2>
                        <p class="text-white/80 mt-2 text-sm md:text-base">
                            Deskripsi singkat untuk banner kedua.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                    <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                    <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>


    {{-- Kategori Pelatihan --}}
    <section class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
        <div class="p-6 border font-bold text-white rounded-lg shadow bg-orange-600 hover:bg-orange-700">Pelatihan Program Kerja</div>
        <div class="p-6 border font-bold text-white rounded-lg shadow bg-orange-600 hover:bg-orange-700">Pelatihan Pemasaran</div>
        <div class="p-6 border font-bold text-white rounded-lg shadow bg-orange-600 hover:bg-orange-700">Pelatihan IT</div>
        <div class="p-6 border font-bold text-white rounded-lg shadow bg-orange-600 hover:bg-orange-700">Pelatihan Manajemen</div>
    </section>

    {{-- FAQ Section --}}
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-6 text-center">FAQ</h2>

        <div id="accordion-faq">
            <!-- FAQ 1 -->
            <h2 id="faq-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-600 border border-b-0 border-gray-200 rounded-t-xl hover:bg-yellow-400 gap-3 transition-colors duration-300"
                    data-accordion-target="#faq-body-1" aria-expanded="false" aria-controls="faq-body-1">
                    <span>Kenapa Saya Harus Ikut Pelatihan?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="faq-body-1"
                class="accordion-body max-h-0 overflow-hidden transition-all duration-500 ease-in-out"
                aria-labelledby="faq-heading-1">
                <div class="p-5 border border-b-0 border-gray-200">
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <h2 id="faq-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-600 border border-b-0 border-gray-200 hover:bg-yellow-400 gap-3 transition-colors duration-300"
                    data-accordion-target="#faq-body-2" aria-expanded="false" aria-controls="faq-body-2">
                    <span>Berapa Lama Saya Harus Pelatihan?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="faq-body-2"
                class="accordion-body max-h-0 overflow-hidden transition-all duration-500 ease-in-out"
                aria-labelledby="faq-heading-2">
                <div class="p-5 border border-b-0 border-gray-200">
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <h2 id="faq-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-600 border border-b-0 border-gray-200 hover:bg-yellow-400 gap-3 transition-colors duration-300"
                    data-accordion-target="#faq-body-3" aria-expanded="false" aria-controls="faq-body-3">
                    <span>Apakah Ada Jaminan Kerja?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="faq-body-3"
                class="accordion-body max-h-0 overflow-hidden transition-all duration-500 ease-in-out"
                aria-labelledby="faq-heading-3">
                <div class="p-5 border border-b-0 border-gray-200">
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <h2 id="faq-heading-4">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-600 border border-gray-200 rounded-b-xl hover:bg-yellow-400 gap-3 transition-colors duration-300"
                    data-accordion-target="#faq-body-4" aria-expanded="false" aria-controls="faq-body-4">
                    <span>Berapa Biaya Pelatihan Kerja?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="faq-body-4"
                class="accordion-body max-h-0 overflow-hidden transition-all duration-500 ease-in-out"
                aria-labelledby="faq-heading-4">
                <div class="p-5 border border-t-0 border-gray-200">
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Berita & Informasi --}}
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-center text-2xl font-bold mb-6">BERITA & INFORMASI</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach (range(1, 8) as $i)
                <div class="border rounded-lg shadow overflow-hidden">
                    <div class="bg-gray-300 h-40"></div>
                    <div class="p-4">
                        <h3 class="font-semibold">Thumbnail Label</h3>
                        <p class="text-sm text-gray-600 mt-2">Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                        <a href="#" class="inline-block mt-3 px-4 py-2 bg-orange-600 text-black text-sm rounded hover:bg-orange-700">Button</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script>
            document.querySelectorAll('#accordion-faq [data-accordion-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const body = document.querySelector(button.getAttribute('data-accordion-target'));
                    const expanded = button.classList.contains('bg-yellow-500');

                    if (expanded) {
                        // Jika sudah aktif → tutup
                        body.classList.add('max-h-0');
                        body.classList.remove('max-h-screen');
                        button.classList.remove('bg-yellow-500', 'text-black', 'font-bold');
                    } else {
                        // Tutup semua accordion lain
                        document.querySelectorAll('#accordion-faq .accordion-body').forEach(el => {
                            el.classList.add('max-h-0');
                            el.classList.remove('max-h-screen');
                            el.previousElementSibling.querySelector('button').classList.remove('bg-yellow-500', 'text-black', 'font-bold');
                        });

                        // Buka yang diklik
                        body.classList.remove('max-h-0');
                        body.classList.add('max-h-screen');
                        button.classList.add('bg-yellow-500', 'text-black', 'font-bold');
                    }
                });
            });
        </script>
    @endpush

</x-layouts.app>
