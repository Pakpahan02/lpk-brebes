<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Pelatihan' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <nav id="navbar" class="bg-white fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            {{-- Logo --}}
            <div class="font-bold text-xl text-slate-700">LOGO</div>

            {{-- Menu --}}
            <ul class="hidden md:flex flex-1 justify-end ml-10">
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium mr-8">Profile</a></li>
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium mr-8">Berita</a></li>
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium mr-8">Lokasi</a></li>
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium mr-8">Pelatihan</a></li>
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium mr-8">Hubungi Kami</a></li>
                <li><a href="#" class="text-slate-500 hover:text-slate-700 font-medium">Login</a></li>
            </ul>
        </div>
    </nav>

    {{-- Spacer biar konten tidak ketutup navbar fixed --}}
    <div class="h-16"></div>


    {{-- Main Content --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-gray-200 mt-10">
        <div class="container mx-auto px-6 py-8 grid md:grid-cols-3 gap-6">
            <div>
                <h4 class="font-semibold mb-2">Alamat</h4>
                <p>Jl. Contoh No. 123, Jakarta</p>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Informasi</h4>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Sosial Media</h4>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center py-4 border-t border-gray-700">
            &copy; {{ date('Y') }} Website Pelatihan. All rights reserved.
        </div>
    </footer>

    {{-- Tempat script tambahan dari child view --}}
    @stack('scripts')
</body>
<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 10) {
            navbar.classList.add("bg-white/80", "backdrop-blur", "shadow");
            navbar.classList.remove("bg-white");
        } else {
            navbar.classList.add("bg-white");
            navbar.classList.remove("bg-white/80", "backdrop-blur", "shadow");
        }
    });
</script>
</html>
