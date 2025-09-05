<x-layouts.front>
    <section class="container mx-auto px-6 py-10">

        {{-- Breadcrumbs --}}
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('news.index') }}" class="hover:underline">Berita & Informasi</a>
            <span class="mx-2">/</span>
            <span>{{ Str::limit($news->title, 50) }}</span>
        </div>

        {{-- Main Article Section --}}
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            {{-- Image --}}
            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}"
                     alt="{{ $news->title }}"
                     class="w-full h-96 object-cover object-center"
                     width="1280" height="400">
            @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center text-gray-400 text-lg font-medium">
                    Tidak ada gambar
                </div>
            @endif

            <div class="p-6 md:p-10 lg:p-12">
                {{-- Metadata --}}
                <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h.01M7 21h.01M17 7h.01M17 3h.01M17 21h.01M3 17v-1a4 4 0 014-4h10a4 4 0 014 4v1a4 4 0 01-4 4H7a4 4 0 01-4-4z"></path>
                        </svg>
                        <span class="font-medium text-orange-600 uppercase">{{ $news->category->label() }}</span>
                    </span>
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h.01M11 11h.01M15 11h.01M11 15h.01M15 15h.01M11 19h.01M15 19h.01M5 19h.01M19 19h.01M7 11h.01M17 11h.01M7 15h.01M17 15h.01M7 19h.01M19 19h.01"></path>
                        </svg>
                        {{ $news->created_at->isoFormat('LL') }}
                    </span>
                </div>

                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold leading-tight text-gray-900 mb-6">
                    {{ $news->title }}
                </h1>

                {{-- Content --}}
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! $news->description !!}
                </div>
            </div>
        </div>


        {{-- Related News Section --}}
        @if ($relatedNews->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">
                    Baca Juga
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedNews as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('news.show', $item->id) }}" class="block">
                                {{-- Image --}}
                                <div class="w-full h-[180px] bg-gray-200 overflow-hidden">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                             alt="{{ $item->title }}"
                                             class="w-full h-full object-cover"
                                             width="320" height="180">
                                    @else
                                        <div class="flex items-center justify-center h-full text-gray-400">
                                            Tidak ada gambar
                                        </div>
                                    @endif
                                </div>
                                {{-- Content --}}
                                <div class="p-4">
                                    <span class="text-xs font-medium text-orange-600 uppercase">{{ $item->category->label() }}</span>
                                    <h3 class="font-semibold text-lg mt-2 line-clamp-2 text-gray-800 hover:text-orange-600 transition-colors">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                                        {{ Str::limit(strip_tags($item->description), 80) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </section>
</x-layouts.front>