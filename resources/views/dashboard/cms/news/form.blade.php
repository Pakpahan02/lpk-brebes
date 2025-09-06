<x-layouts.app :title="__('Berita')">
    @php
        $isEdit = isset($news);
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                {{ $isEdit ? 'Edit Berita' : 'Tambah Berita' }}
            </h3>
            <flux:button :href="route('dashboard.cms.news.index')">
                Kembali
            </flux:button>
        </div>

        {{-- Alert --}}
        @if (session()->has('success'))
            <div class="mb-6">
                <flux:callout variant="success" icon="check-circle" heading="{{ session('success') }}" />
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-6">
                <flux:callout variant="error" icon="x-circle" heading="{{ session('error') }}" />
            </div>
        @endif

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 py-8 px-10">
            <form
                method="POST"
                enctype="multipart/form-data"
                action="{{ $isEdit ? route('dashboard.cms.news.update', $news->id) : route('dashboard.cms.news.store') }}"
            >
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="mb-6 border border-gray-300 rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-2">
                        {{-- Kategori --}}
                        <div>
                            <label class="block font-medium mb-1">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="category"
                                class="w-full border border-gray-300 rounded px-3 py-2"
                            >
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->value }}"
                                        {{ old('category', $news->category ?? '') == $category->value ? 'selected' : '' }}>
                                        {{ $category->label() }}
                                    </option>
                                @endforeach
                            </select>
                            <flux:error name="category" />
                        </div>

                        {{-- Judul --}}
                        <div>
                            <label class="block font-medium mb-1">
                                Judul <span class="text-red-500">*</span>
                            </label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="title"
                                type="text"
                                value="{{ old('title', $news->title ?? '') }}"
                            />
                            <flux:error name="title" />
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Deskripsi <span class="text-red-500">*</span></label>
                        {{-- Input hidden ini yang akan dikirim ke server --}}
                        <input
                            id="x"
                            type="hidden"
                            name="description"
                            value="{{ old('description', $news->description ?? '') }}"
                        >
                        {{-- Ini adalah editor visual yang dilihat pengguna --}}
                        <trix-editor input="x" class="bg-white trix-content"></trix-editor>
                        <flux:error name="description" />
                    </div>

                    {{-- Gambar --}}
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Gambar (320x200)</label>
                        <input
                            type="file"
                            name="image"
                            class="w-full border border-gray-300 rounded px-3 py-2"
                        />
                        <flux:error name="image" />

                        @if ($isEdit && !empty($news->image))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="Berita" class="h-32 rounded">
                            </div>
                        @endif
                    </div>

                    {{-- Status tampil --}}
                    <div class="mt-4">
                        <label class="inline-flex items-center gap-2">
                            <input
                                type="checkbox"
                                name="visible"
                                value="1"
                                {{ old('visible', $news->visible ?? false) ? 'checked' : '' }}
                            >
                            <span>Tampilkan di publik</span>
                        </label>
                        <flux:error name="visible" />
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-2 flex gap-2">
                    <button
                        class="text-sm px-4 py-1.5 rounded border border-teal-500 text-teal-700 hover:bg-teal-100"
                        type="submit"
                    >
                        {{ $isEdit ? 'Ubah' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
