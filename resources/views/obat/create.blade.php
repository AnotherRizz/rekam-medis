<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Obat</label>
                    <input type="text" name="nama" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Stok</label>
                    <input type="number" name="stok" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Harga</label>
                    <input type="number" name="harga" class="w-full border rounded p-2" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('obat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
