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
                        Jl. Letjen R. Soeprapto No. 10 B, Cempaka Putih Timur, Jakarta Pusat, DKI Jakarta,
                        Indonesia.
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="block">Lihat peta lebih besar</span>
                        <span class="block">4.2 ⭐ (28 reviews)</span>
                    </p>
                </div>

                {{-- Placeholder untuk Google Maps Iframe --}}
                <div class="w-full h-[400px] rounded-lg overflow-hidden border border-gray-200">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.526279930726!2d106.87413471476906!3d-6.195079695509795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f53839211327%3A0x7d066b1d42a98f7e!2sKementerian%20Ketenagakerjaan%20Republik%20Indonesia!5e0!3m2!1sid!2sid!4v1628173428987!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-layouts.front>