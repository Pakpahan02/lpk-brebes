<x-layouts.app :title="__('Pengguna')">
    @php
        $isEdit = isset($user);
    @endphp
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                {{ $isEdit ? 'Edit Pengguna' : 'Tambah Pengguna' }}
            </h3>
            <flux:button
                :href="route('dashboard.master.user.index')"
            >
                Kembali
            </flux:button>
        </div>

        @if (session()->has('success'))
            <div class="mb-6">
                <flux:callout variant="success" icon="check-circle" heading="{{ session('success') }}" />
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-6">
                <flux:callout variant="error" icon="x-circle" heading="{{ session('error') }}" />
            </div>
        @endif
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 py-8 px-10">
            <form
                method="POST"
                action="{{ $isEdit ? route('dashboard.master.user.update', $user->id) : route('dashboard.master.user.store') }}"
            >
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="kode-risiko-block mb-6 border border-gray-300 rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-2">
                        <!-- Name -->
                        <div>
                            <label class="block font-medium mb-1">Nama <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="name"
                                type="text"
                                value="{{ old('name', $user->name ?? '') }}"
                            />
                            <flux:error name="name" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block font-medium mb-1">Email <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="email"
                                type="email"
                                value="{{ old('email', $user->email ?? '') }}"
                            />
                            <flux:error name="email" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block font-medium mb-1">Password <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="password"
                                type="password"
                                value="{{ old('password') }}"
                            />
                            <flux:error name="password" />
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label class="block font-medium mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                name="password_confirmation"
                                type="password"
                                value="{{ old('password_confirmation') }}"
                            />
                            <flux:error name="password_confirmation" />
                        </div>
                    </div>
                </div>

                <div class="mt-2 flex gap-2">
                    <button
                        class="text-sm px-4 py-1.5 rounded border border-teal-500 text-teal-700 hover:bg-teal-100"
                        type="submit"
                    >
                        {{ $isEdit ? 'Ubah' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
