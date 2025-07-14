<x-app-layout>
    <x-slot name="header">Tambah Pembayaran</x-slot>

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Pilih Pemeriksaan</label>
                <select name="pemeriksaan_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Pemeriksaan --</option>
                    @foreach ($pemeriksaans as $periksa)
                        <option value="{{ $periksa->id }}" 
                            {{ old('pemeriksaan_id', $pemeriksaanTerpilih->id ?? '') == $periksa->id ? 'selected' : '' }}>
                            {{ $periksa->no_periksa }} - {{ $periksa->pasien->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Biaya Periksa</label>
                <input type="number" name="biaya_periksa" step="0.01" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label>Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="w-full border p-2 rounded" required>
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('pembayaran.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
