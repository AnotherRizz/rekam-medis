<x-app-layout>
    <x-slot name="header">Detail Pasien</x-slot>

    <div class="max-w-5xl mx-auto bg-white shadow rounded p-6 space-y-6">
        <div>
            <h2 class="text-xl font-bold">{{ $pasien->nama }}</h2>
            <p class="text-sm text-gray-500 mb-4">No Pasien: <span class="font-medium">{{ $pasien->no_pasien }}</span></p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="font-semibold">Alamat:</span>
                    <p>{{ $pasien->alamat }}</p>
                </div>

                <div>
                    <span class="font-semibold">Tanggal Lahir:</span>
                    <p>{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d-m-Y') }}</p>
                </div>

                <div>
                    <span class="font-semibold">No Telepon:</span>
                    <p>{{ $pasien->no_tlp }}</p>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-2">Riwayat Pemeriksaan</h3>

            @if ($pasien->pemeriksaans->count() > 0)
                <div class="overflow-x-auto bg-gray-50 rounded shadow">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-200 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-2">No Periksa</th>
                                <th>Tanggal</th>
                                <th>Keluhan</th>
                                <th>BB/TB</th>
                                <th>Tensi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien->pemeriksaans as $periksa)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $periksa->no_periksa }}</td>
                                    <td>{{ $periksa->tgl_periksa }}</td>
                                    <td>{{ $periksa->keluhan }}</td>
                                    <td>{{ $periksa->bb }}kg / {{ $periksa->tb }}cm</td>
                                    <td>{{ $periksa->tensi_darah }}</td>
                                    <td>
                                        <a href="{{ route('pemeriksaan.show', $periksa) }}" class="bg-blue-500 text-white text-xs px-3 py-1 rounded">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">Belum ada riwayat pemeriksaan.</p>
            @endif
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('pasien.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white text-xs px-3 py-1 rounded">Kembali</a>
            <a href="{{ route('pasien.edit', $pasien) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs px-3 py-1 rounded">Edit</a>
        </div>
    </div>
</x-app-layout>
