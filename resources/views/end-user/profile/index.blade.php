<x-layouts.front>
    {{-- Bagian Header dengan Gambar Latar --}}
    <div class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                Mengenal lebih dekat visi, misi, dan perjalanan kami dalam memberikan solusi terbaik.
            </p>
        </div>
    </div>

    <section class="container mx-auto px-6 py-16">

        {{-- Kartu Utama Profil Perusahaan --}}
        <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-8 md:p-12">

            {{-- Bagian Sejarah Perusahaan --}}
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-800 mb-6 border-l-4 border-orange-500 pl-4">Sejarah Kami</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        Ceritakan awal mula berdirinya perusahaan Anda di sini. Jelaskan momen penting, tantangan yang dihadapi, dan bagaimana perusahaan tumbuh hingga menjadi seperti sekarang. Paragraf ini sebaiknya memberikan gambaran yang kuat tentang fondasi dan perjalanan perusahaan.
                    </p>
                    <p>
                        Anda bisa menambahkan paragraf kedua untuk menjelaskan pencapaian-pencapaian utama atau tonggak sejarah yang signifikan, seperti peluncuran produk penting, ekspansi ke pasar baru, atau penghargaan yang pernah diraih.
                    </p>
                </div>
            </div>

            {{-- Bagian Visi & Misi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                {{-- Visi --}}
                <div>
                    <h3 class="text-2xl font-bold text-slate-700 mb-4 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Visi Kami
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi perusahaan terdepan di industri [Sebutkan Industri Anda] yang dikenal karena inovasi, kualitas, dan komitmen terhadap kepuasan pelanggan.
                    </p>
                </div>
                {{-- Misi --}}
                <div>
                    <h3 class="text-2xl font-bold text-slate-700 mb-4 flex items-center gap-3">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Misi Kami
                    </h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 leading-relaxed">
                        <li>Memberikan produk/layanan berkualitas tinggi secara konsisten.</li>
                        <li>Membangun hubungan jangka panjang dengan klien dan mitra.</li>
                        <li>Mendorong inovasi dan pengembangan berkelanjutan.</li>
                        <li>Menciptakan lingkungan kerja yang positif dan produktif.</li>
                    </ul>
                </div>
            </div>

             {{-- Bagian Nilai-Nilai Perusahaan --}}
            <div>
                 <h2 class="text-3xl font-bold text-slate-800 mb-8 text-center">Nilai-Nilai Kami</h2>
                 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Nilai 1: Integritas --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <div class="text-orange-500 mb-4 inline-block">
                            {{-- Icon Placeholder --}}
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <h4 class="text-xl font-semibold text-slate-700 mb-2">Integritas</h4>
                        <p class="text-gray-600">Kami menjunjung tinggi kejujuran dan etika dalam setiap tindakan.</p>
                    </div>
                     {{-- Nilai 2: Inovasi --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <div class="text-orange-500 mb-4 inline-block">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                        </div>
                        <h4 class="text-xl font-semibold text-slate-700 mb-2">Inovasi</h4>
                        <p class="text-gray-600">Kami selalu mencari cara baru dan lebih baik untuk melayani Anda.</p>
                    </div>
                     {{-- Nilai 3: Kolaborasi --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <div class="text-orange-500 mb-4 inline-block">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.084-1.28-.24-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.084-1.28.24-1.857m10.48-5.492a4 4 0 10-5.96-5.96 4 4 0 105.96 5.96zM14 10.5a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </div>
                        <h4 class="text-xl font-semibold text-slate-700 mb-2">Kolaborasi</h4>
                        <p class="text-gray-600">Kami percaya pada kekuatan kerja tim untuk mencapai hasil terbaik.</p>
                    </div>
                 </div>
            </div>
        </div>
    </section>
</x-layouts.front>