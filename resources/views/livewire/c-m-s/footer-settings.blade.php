<div>
    {{-- Notifikasi Sukses --}}
    @if (session()->has('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert">
            <p class="font-bold">Sukses</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Kontainer Utama Form dalam bentuk Kartu --}}
    <div class="relative rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-slate-800 p-8">

        <form wire:submit="save" class="space-y-6">

            {{-- Alamat --}}
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                <div class="mt-1">
                    <textarea wire:model="address" id="address" name="address" rows="4"
                              class="block w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-orange-500 dark:bg-slate-700 dark:border-transparent dark:focus:border-orange-500 dark:focus:ring-orange-500 transition-all"
                              placeholder="Masukkan alamat lengkap perusahaan"></textarea>
                </div>
                @error('address') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Facebook URL --}}
            <div>
                <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook URL</label>
                <div class="mt-1">
                    <input wire:model="facebook" id="facebook" name="facebook" type="url"
                           placeholder="https://facebook.com/namaperusahaan"
                           class="block w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-orange-500 dark:bg-slate-700 dark:border-transparent dark:focus:border-orange-500 dark:focus:ring-orange-500 transition-all">
                </div>
                @error('facebook') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Instagram URL --}}
            <div>
                <label for="instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram URL</label>
                <div class="mt-1">
                    <input wire:model="instagram" id="instagram" name="instagram" type="url"
                           placeholder="https://instagram.com/namaperusahaan"
                           class="block w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-orange-500 dark:bg-slate-700 dark:border-transparent dark:focus:border-orange-500 dark:focus:ring-orange-500 transition-all">
                </div>
                @error('instagram') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- LinkedIn URL --}}
            <div>
                <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">LinkedIn URL</label>
                <div class="mt-1">
                    <input wire:model="linkedin" id="linkedin" name="linkedin" type="url"
                           placeholder="https://linkedin.com/company/namaperusahaan"
                           class="block w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-orange-500 dark:bg-slate-700 dark:border-transparent dark:focus:border-orange-500 dark:focus:ring-orange-500 transition-all">
                </div>
                @error('linkedin') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <span wire:loading.remove wire:target="save">Simpan Perubahan</span>
                    <span wire:loading wire:target="save">Menyimpan...</span>
                </button>
            </div>

        </form>
    </div>
</div>