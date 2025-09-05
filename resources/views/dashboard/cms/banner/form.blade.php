<x-layouts.app :title="__('Banner')">
    @php
        $isEdit = isset($banner);
    @endphp
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                {{ $isEdit ? 'Edit Banner' : 'Tambah Banner' }}
            </h3>
            <flux:button :href="route('dashboard.cms.banner.index')">
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
                action="{{ $isEdit ? route('dashboard.cms.banner.update', $banner->id) : route('dashboard.cms.banner.store') }}"
            >
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="kode-risiko-block mb-6 border border-gray-300 rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-2">
                        {{-- Judul --}}
                        <div>
                            <label class="block font-medium mb-1">Judul <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="title"
                                type="text"
                                value="{{ old('title', $banner->title ?? '') }}"
                            />
                            <flux:error name="title" />
                        </div>

                        {{-- Link --}}
                        <div>
                            <label class="block font-medium mb-1">Link <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="link"
                                type="url"
                                value="{{ old('link', $banner->link ?? '') }}"
                            />
                            <flux:error name="link" />
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea
                            class="w-full border border-gray-300 rounded px-3 py-2"
                            name="description"
                            rows="4"
                        >{{ old('description', $banner->description ?? '') }}</textarea>
                        <flux:error name="description" />
                    </div>

                    {{-- Gambar --}}
                    <div class="mt-4 pb-2">
                        <label class="block font-medium mb-1">Gambar <span class="text-red-500">*</span></label>
                        <input
                            class="w-full border border-gray-300 rounded px-3 py-2"
                            name="image"
                            type="file"
                            accept="image/*"
                        />
                        <flux:error name="image" />

                        @if ($isEdit && !empty($banner->image))
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner" class="h-32 rounded">
                            </div>
                        @endif
                    </div>
                </div>

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
