<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="rounded-xl bg-white p-6 shadow-md dark:bg-neutral-800">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Selamat datang, {{ Auth::user()->name }} 👋
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Semoga harimu menyenangkan dan produktif!
            </p>
        </div>

    </div>
</x-layouts.app>
