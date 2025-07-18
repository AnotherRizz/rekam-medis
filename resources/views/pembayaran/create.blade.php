<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Pembayaran</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto bg-white p-8 rounded shadow mt-6 p-3">
        <form action="{{ route('pembayaran.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-medium mb-1">Pilih Pemeriksaan</label>
                <select name="pemeriksaan_id" class="w-full border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required>
                    <option value="">-- Pilih Pemeriksaan --</option>
                    @foreach ($pemeriksaans as $periksa)
                        <option value="{{ $periksa->id }}" 
                            {{ old('pemeriksaan_id', $pemeriksaanTerpilih->id ?? '') == $periksa->id ? 'selected' : '' }}>
                            {{ $periksa->no_periksa }} - {{ $periksa->pasien->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Biaya Periksa</label>
                <input type="number" name="biaya_periksa" step="0.01"
                    class="w-full border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar"
                    class="w-full border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('pembayaran.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
