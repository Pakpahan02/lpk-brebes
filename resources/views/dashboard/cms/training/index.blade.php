<x-layouts.app :title="__('Pelatihan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                Pelatihan
            </h3>
            <flux:button
                :href="route('dashboard.cms.training.create')"
            >
                Tambah
            </flux:button>
        </div>

        @if (session()->has('success'))
            <div class="mb-6">
                <flux:callout
                    variant="success"
                    icon="check-circle"
                    heading="{{ session('success') }}"
                />
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-6">
                <flux:callout
                    variant="error"
                    icon="check-circle"
                    heading="{{ session('error') }}"
                />
            </div>
        @endif

        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 py-8 px-10"
            x-data="{
                openModal: false,
                deletionId: null,
                deletionRoute: '',
            }"
        >
            <livewire:training-data-table />

            <x-dashboard.deletion-modal />
        </div>
    </div>
</x-layouts.app>