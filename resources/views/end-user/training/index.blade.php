<x-layouts.front>
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold mb-4 text-orange-600">Pelatihan</h2>
        <p class="text-center text-gray-600 mb-10">Temukan pelatihan yang anda inginkan.</p>

        {{-- Section Berita Terbaru --}}
        @if ($latestTraining)
            <div class="mb-12">
                <div class="relative w-full h-[400px] md:h-[500px] lg:h-[600px] rounded-xl overflow-hidden shadow-lg">
                    {{-- Image --}}
                    @if ($latestTraining->image)
                        <img src="{{ asset('storage/' . $latestTraining->image) }}"
                             alt="{{ $latestTraining->title }}"
                             class="absolute inset-0 w-full h-full object-cover brightness-[0.7]">
                    @else
                        <div class="absolute inset-0 w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-lg">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Overlay Content --}}
                    <div class="absolute bottom-0 left-0 p-6 md:p-10 text-white z-10">
                        <span class="text-sm md:text-base font-semibold text-orange-400 uppercase tracking-wide">
                            {{ $latestTraining->training_category->name }}
                        </span>
                        <h3 class="mt-2 text-2xl md:text-4xl lg:text-5xl font-bold leading-tight line-clamp-2">
                            {{ $latestTraining->title }}
                        </h3>
                        <p class="mt-2 text-sm md:text-base line-clamp-3 md:line-clamp-4 max-w-2xl">
                            {{ Str::limit(strip_tags($latestTraining->description), 200) }}
                        </p>
                        <a href="{{ route('traning.show', $latestTraining->id) }}"
                           class="inline-flex items-center mt-4 px-4 py-2 bg-orange-600 text-white rounded-full font-medium transition-all duration-300 hover:bg-orange-700">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        {{-- Filter Section --}}
        <div class="mb-8 p-6 bg-gray-50 rounded-lg shadow-md">
            <h4 class="text-xl font-semibold mb-4">Cari Berita</h4>
            <form action="{{ route('training.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                {{-- Filter Judul --}}
                <div class="md:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                    <input type="text"
                           name="search"
                           id="search"
                           value="{{ request('search') }}"
                           placeholder="Cari berdasarkan judul..."
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                </div>

                {{-- Filter Kategori --}}
                <div class="md:col-span-1">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category"
                            id="category"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id}}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Button Aksi --}}
                <div class="flex space-x-2 md:col-span-1">
                    <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari
                    </button>
                    <a href="{{ route('training.index') }}"
                       class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Card Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($trainings as $item)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col">
                    {{-- Image --}}
                    <a href="{{ route('training.show', $item->id) }}" class="relative w-full h-[200px] bg-gray-200 overflow-hidden">
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
                            {{ $item->training_category->name }}
                        </span>
                        <h3 class="font-semibold text-lg mt-2 line-clamp-2 text-gray-800 hover:text-orange-600 transition-colors">
                            <a href="{{ route('training.show', $item->id) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                            {{ Str::limit(strip_tags($item->description), 100) }}
                        </p>
                        <a href="{{ route('training.show', $item->id) }}"
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

        {{-- Pagination --}}
        @if ($trainings->hasPages())
            <div class="mt-10">
                {{ $trainings->links() }}
            </div>
        @endif
    </section>
</x-layouts.front>