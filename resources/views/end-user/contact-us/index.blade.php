<x-layouts.front>
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-center text-3xl font-bold mb-4 text-slate-800">Hubungi Kami</h2>
        <p class="text-center text-gray-600 mb-10">Kami siap mendengarkan pertanyaan dan masukan Anda.</p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            {{-- Form Kontak --}}
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-10 flex flex-col">
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="full_name" class="sr-only">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" placeholder="Nama Lengkap"
                                   class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all">
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email"
                                   class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- No. Telepon --}}
                        <div>
                            <label for="phone" class="sr-only">No. Telepon / Handphone Aktif</label>
                            <input type="tel" id="phone" name="phone" placeholder="No. Telepon / Handphone Aktif"
                                   class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all">
                        </div>
                        {{-- Alamat --}}
                        <div>
                            <label for="address" class="sr-only">Alamat</label>
                            <input type="text" id="address" name="address" placeholder="Alamat"
                                   class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all">
                        </div>
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label for="message" class="sr-only">Tuangkan pesanmu untuk BNSP disini</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tuangkan pesanmu untuk BNSP disini"
                                  class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all"></textarea>
                    </div>

                    {{-- Captcha --}}
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <div class="bg-gray-200 rounded-md p-2">
                            {{-- Placeholder untuk Captcha Image --}}
                            <div class="w-24 h-10 flex items-center justify-center text-gray-500 font-bold bg-white rounded-sm">
                                CAPTCHA
                            </div>
                        </div>
                        <div class="flex-1 w-full">
                            <input type="text" name="captcha" placeholder="Masukkan kode CAPTCHA di sini"
                                   class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div>
                        <button type="submit"
                                class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

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