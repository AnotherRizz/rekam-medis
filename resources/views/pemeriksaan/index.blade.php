<x-app-layout>
    <x-slot name="header">Data Pemeriksaan</x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('pemeriksaan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah
                Pemeriksaan</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2">No Periksa</th>
                        <th>Pasien</th>
                        <th>Tanggal Periksa</th>
                        <th>BB</th>
                        <th>TB</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemeriksaans as $pemeriksaan)
                        <tr>
                            <td class="px-4 py-2">{{ $pemeriksaan->no_periksa }}</td>
                            <td>{{ $pemeriksaan->pasien->nama }}</td>
                            <td>{{ $pemeriksaan->tgl_periksa }}</td>
                            <td>{{ $pemeriksaan->bb }} kg</td>
                            <td>{{ $pemeriksaan->tb }} cm</td>
                            <td class="space-x-1">
                                <a href="{{ route('pemeriksaan.show', $pemeriksaan) }}"
                                    class="bg-blue-500 text-white text-xs px-3 py-1 rounded">Detail</a>
                                <a href="{{ route('pemeriksaan.edit', $pemeriksaan) }}"
                                    class="bg-yellow-400 text-white text-xs px-3 py-1 rounded">Edit</a>

                                <form action="{{ route('pemeriksaan.destroy', $pemeriksaan) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white text-xs px-3 py-1 rounded">Hapus</button>
                                </form>

                                @if ($pemeriksaan->pembayaran)
                                    <a href="{{ route('pembayaran.show', $pemeriksaan->pembayaran->id) }}"
                                        class="bg-green-600 text-white text-xs px-3 py-1 rounded">Lihat Pembayaran</a>
                                @else
                                  <a href="{{ route('pembayaran.create', ['pemeriksaan_id' => $pemeriksaan->id]) }}" class="bg-green-500 text-white text-xs px-3 py-1 rounded">Bayar</a>

                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
