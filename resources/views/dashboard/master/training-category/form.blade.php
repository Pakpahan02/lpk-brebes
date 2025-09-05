<x-layouts.app :title="__('Kategori Pelatihan')">
    @php
        $isEdit = isset($trainingCategory);
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                {{ $isEdit ? 'Edit Kategori Pelatihan' : 'Tambah Kategori Pelatihan' }}
            </h3>
            <flux:button :href="route('dashboard.master.training-category.index')">
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
                action="{{ $isEdit ? route('dashboard.master.training-category.update', $trainingCategory->id) : route('dashboard.master.training-category.store') }}"
            >
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="mb-6 border border-gray-300 rounded-lg p-4">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block font-medium mb-1">
                                Nama Kategori <span class="text-red-500">*</span>
                            </label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="name"
                                type="text"
                                value="{{ old('name', $trainingCategory->name ?? '') }}"
                                required
                            />
                            <flux:error name="name" />
                        </div>
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
