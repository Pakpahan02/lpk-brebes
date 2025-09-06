<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        {{-- Ganti 'partials.head' dengan meta tag dasar jika diperlukan --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-200 antialiased">
        <div class="flex min-h-svh flex-col items-center justify-center p-6">
            <div class="mb-8 text-center">
                <a href="{{ route('home') }}" wire:navigate>

                    <img src="{{ asset('/img/logo.jpeg') }}" alt="Logo Perusahaan" class="mx-auto h-12">
                </a>
                <h2 class="mt-6 text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                    {{ $title ?? 'Selamat Datang' }}
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ $subtitle ?? 'Silakan masuk untuk melanjutkan.' }}
                </p>
            </div>

            <div class="w-full max-w-md bg-white rounded-xl shadow-lg dark:bg-slate-800">
                <div class="px-8 py-8 md:px-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>