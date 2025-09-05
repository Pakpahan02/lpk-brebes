<!-- Modal Delete -->
<div
x-show="openModal"
style="display: none;"
class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>
    <div @click.away="openModal = false" class="bg-white rounded-lg p-6 max-w-md w-full shadow-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Penghapusan</h2>
        <p class="text-sm text-gray-600 mb-6">
            Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="flex justify-end gap-2">
            <button
                type="button"
                class="px-4 py-2 text-gray-700 bg-gray-100 rounded hover:bg-gray-200"
                @click="openModal = false"
            >
                Batal
            </button>
            <form :action="deletionRoute" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                >
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>