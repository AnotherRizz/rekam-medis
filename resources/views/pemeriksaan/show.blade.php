<x-app-layout>
    <x-slot name="header">Detail Pemeriksaan</x-slot>

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow space-y-4">
        <div>
            <h2 class="text-lg font-bold">No Pemeriksaan: {{ $pemeriksaan->no_periksa }}</h2>
            <p class="text-gray-500">Tanggal Periksa: {{ $pemeriksaan->tgl_periksa }}</p>
        </div>

        <div>
            <span class="font-semibold">Pasien:</span>
            <p>{{ $pemeriksaan->pasien->no_pasien }} - {{ $pemeriksaan->pasien->nama }}</p>
        </div>

        <div>
            <span class="font-semibold">Keluhan:</span>
            <p>{{ $pemeriksaan->keluhan }}</p>
        </div>

        <div>
            <span class="font-semibold">Riwayat Penyakit:</span>
            <p>{{ $pemeriksaan->riwayat_penyakit }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <span class="font-semibold">Berat Badan:</span>
                <p>{{ $pemeriksaan->bb }} kg</p>
            </div>
            <div>
                <span class="font-semibold">Tinggi Badan:</span>
                <p>{{ $pemeriksaan->tb }} cm</p>
            </div>
            <div>
                <span class="font-semibold">Tensi Darah:</span>
                <p>{{ $pemeriksaan->tensi_darah }}</p>
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('pemeriksaan.index') }}" class="bg-gray-500 text-white text-xs px-3 py-1 rounded">Kembali</a>
            <a href="{{ route('pemeriksaan.edit', $pemeriksaan) }}" class="bg-yellow-400 text-white text-xs px-3 py-1 rounded">Edit</a>
        </div>
    </div>
</x-app-layout>
