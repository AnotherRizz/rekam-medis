<x-app-layout>
    <x-slot name="header">Tambah Pemeriksaan</x-slot>

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('pemeriksaan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Pasien</label>
                <select name="pasien_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach ($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->no_pasien }} - {{ $pasien->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Keluhan</label>
                <textarea name="keluhan" class="w-full border p-2 rounded" required>{{ old('keluhan') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Riwayat Penyakit</label>
                <textarea name="riwayat_penyakit" class="w-full border p-2 rounded" required>{{ old('riwayat_penyakit') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Berat Badan (kg)</label>
                    <input type="number" step="0.01" name="bb" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>Tinggi Badan (cm)</label>
                    <input type="number" step="0.01" name="tb" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label>Tensi Darah</label>
                    <input type="text" name="tensi_darah" class="w-full border p-2 rounded"
                        placeholder="Contoh: 120/80">
                </div>
                <div>
                    <label>Obat</label>
                    <select name="obat_id" class="w-full border p-2 rounded">
                        <option value="">-- Pilih Obat --</option>
                        @foreach ($obats as $obat)
                            <option value="{{ $obat->id }}"
                                {{ old('obat_id', $pemeriksaan->obat_id ?? '') == $obat->id ? 'selected' : '' }}>
                                {{ $obat->nama }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Jumlah Obat</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $pemeriksaan->jumlah ?? 1) }}"
                        min="1" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label>Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" class="w-full border p-2 rounded" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-2">
                <a href="{{ route('pemeriksaan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
