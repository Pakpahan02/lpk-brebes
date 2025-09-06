<div class="bg-white rounded-xl shadow-lg p-8 md:p-10 flex flex-col">

    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="saveContact" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama Lengkap --}}
            <div>
                <label for="full_name" class="sr-only">Nama Lengkap</label>
                <input type="text" id="name" wire:model.defer="name" placeholder="Nama Lengkap"
                       class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('fullName') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            {{-- Email --}}
            <div>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" wire:model.defer="email" placeholder="Email"
                       class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('email') border-red-500 @enderror">
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- No. Telepon --}}
            <div>
                <label for="phone" class="sr-only">No. Telepon / Handphone Aktif</label>
                <input type="tel" id="phone" wire:model.defer="phone" placeholder="No. Telepon / Handphone Aktif"
                       class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('phone') border-red-500 @enderror">
                @error('phone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            {{-- Alamat --}}
            <div>
                <label for="address" class="sr-only">Alamat</label>
                <input type="text" id="address" wire:model.defer="address" placeholder="Alamat (Opsional)"
                       class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('address') border-red-500 @enderror">
                @error('address') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Pesan --}}
        <div>
            <label for="message" class="sr-only">Tuangkan pesanmu untuk BNSP disini</label>
            <textarea id="message" wire:model.defer="message" rows="5" placeholder="Tuangkan pesanmu untuk BNSP disini"
                      class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('message') border-red-500 @enderror"></textarea>
            @error('message') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Captcha --}}
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <div class="bg-gray-200 rounded-md p-2 flex items-center gap-2">
                {{-- CAPTCHA Image dari Livewire --}}
                <div class="w-28 h-10 flex items-center justify-center text-gray-700 font-bold tracking-[.2em] bg-white rounded-sm text-xl select-none">
                    {{ $captchaCode }}
                </div>
                {{-- Tombol untuk generate ulang CAPTCHA --}}
                <button type="button" wire:click="generateCaptcha" title="Refresh CAPTCHA">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-600 hover:text-orange-600 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 w-full">
                <input type="text" wire:model.defer="captchaInput" placeholder="Masukkan kode CAPTCHA di sini"
                       class="w-full px-4 py-3 bg-gray-100 rounded-lg border-transparent focus:border-orange-500 focus:ring-0 transition-all @error('captchaInput') border-red-500 @enderror">
                @error('captchaInput') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                <div wire:loading.remove wire:target="saveContact">
                    Submit
                </div>
                {{-- Indikator Loading --}}
                <div wire:loading wire:target="saveContact">
                    Mengirim...
                </div>
            </button>
        </div>
    </form>
</div>