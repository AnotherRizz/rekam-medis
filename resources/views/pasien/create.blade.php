<x-app-layout>
    <x-slot name="header">Tambah Pasien</x-slot>

    <div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Nama</label>
                <input type="text" name="nama" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label>Alamat</label>
                <textarea name="alamat" class="w-full border p-2 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label>No Telepon</label>
                <input type="text" name="no_tlp" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('pasien.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
