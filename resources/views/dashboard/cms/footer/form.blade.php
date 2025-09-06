<x-layouts.app :title="__('Footer')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                Footer
            </h3>
        </div>

        <div class="mt-4">
            <livewire:c-m-s.footer-settings />
        </div>
    </div>
</x-layouts.app>