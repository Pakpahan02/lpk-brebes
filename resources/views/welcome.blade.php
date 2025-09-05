<x-layouts.front>

    {{-- Banner Slider --}}
    <section>
        <div id="default-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="3000">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($banners as $banner)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $banner->image) }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="{{ $banner->title }}">

                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-yellow-300/60 via-yellow-500/10 to-transparent"></div>

                        <!-- Title -->
                        <div class="absolute bottom-6 left-6 text-left">
                            <h2 class="text-white text-2xl md:text-4xl font-bold text-shadow-lg/30">
                                {{ $banner->title }}
                            </h2>
                            <p class="text-white/80 mt-2 text-sm md:text-base text-shadow-lg/20">
                                {{ $banner->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
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
            @foreach ($fqas as $index => $faq)
                <h2 id="faq-heading-{{ $index }}">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-gray-600 border {{ $loop->last ? 'rounded-b-xl' : '' }} {{ $loop->first ? 'rounded-t-xl' : '' }} border-gray-200 hover:bg-yellow-400 gap-3 transition-colors duration-300"
                        data-accordion-target="#faq-body-{{ $index }}" aria-expanded="false"
                        aria-controls="faq-body-{{ $index }}">
                        <span>{{ $faq->title }}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="faq-body-{{ $index }}"
                    class="accordion-body max-h-0 overflow-hidden transition-all duration-500 ease-in-out"
                    aria-labelledby="faq-heading-{{ $index }}">
                    <div class="p-5 border border-t-0 border-gray-200">
                        <p class="text-gray-600">{{ $faq->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Berita & Informasi --}}
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-center text-2xl font-bold mb-6">BERITA & INFORMASI</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($news as $item)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col">
                    {{-- Image --}}
                    <a href="{{ route('news.show', $item->id) }}" class="relative w-full h-[200px] bg-gray-200 overflow-hidden">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                width="320" height="200">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                Tidak ada gambar
                            </div>
                        @endif
                    </a>

                    {{-- Content --}}
                    <div class="p-5 flex flex-col flex-1">
                        <span class="text-xs font-medium text-orange-600 uppercase">
                            {{ $item->category }}
                        </span>
                        <h3 class="font-semibold text-lg mt-2 line-clamp-2 text-gray-800 hover:text-orange-600 transition-colors">
                            <a href="{{ route('news.show', $item->id) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                            {{ Str::limit(strip_tags($item->description), 100) }}
                        </p>
                        <a href="{{ route('news.show', $item->id) }}"
                        class="inline-flex items-center mt-4 text-orange-600 text-sm font-medium transition-all duration-300 hover:translate-x-1">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-lg">Tidak ada berita yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        {{-- Button Lihat Semua --}}
        <div class="text-center mt-8">
            <a href="{{ route('news.index') }}"
            class="inline-flex items-center px-6 py-3 bg-orange-600 text-white font-medium rounded-lg shadow hover:bg-orange-700 transition-colors duration-300">
                Lihat Semua Berita
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
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
