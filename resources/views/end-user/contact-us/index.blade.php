<x-layouts.front>
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold mb-4 text-slate-800">Hubungi Kami</h2>
        <p class="text-center text-gray-600 mb-10">Kami siap mendengarkan pertanyaan dan masukan Anda.</p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            {{-- Form Kontak --}}
            <livewire:contact-form />

            {{-- Peta Lokasi --}}
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col">
                <div class="space-y-4 mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hubungi Kami</h3>
                    <p class="text-gray-600">
                        Jl. Brantas Raya No.26, RT.003/RW.014, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="block">Lihat peta lebih besar</span>
                        <span class="block">5.0 ⭐ (3 reviews)</span>
                    </p>
                </div>

                {{-- Placeholder untuk Google Maps Iframe --}}
                <div class="w-full h-[400px] rounded-lg overflow-hidden border border-gray-200">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3573.1167851249998!2d106.95209558968939!3d-6.333759940023958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69931bafe7cc45%3A0xc5fe5a2d8ff998d3!2sWorkshop%20PT.%20BWI!5e0!3m2!1sid!2sid!4v1757157122933!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-layouts.front>