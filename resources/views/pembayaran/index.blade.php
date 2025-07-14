<x-app-layout>
    <x-slot name="header">Data Pembayaran</x-slot>

    <div class="max-w-5xl mx-auto space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Pembayaran</h2>
            <a href="{{ route('pembayaran.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                + Tambah Pembayaran
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow border">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Kode Bayar</th>
                        <th class="px-4 py-3">Pasien</th>
                        <th class="px-4 py-3">Biaya Periksa</th>
                        <th class="px-4 py-3">Biaya Obat</th>
                        <th class="px-4 py-3">Tanggal Bayar</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembayarans as $bayar)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $bayar->kode_bayar }}</td>
                            <td class="px-4 py-2">{{ $bayar->pemeriksaan->pasien->nama }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($bayar->biaya_periksa,0,',','.') }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($bayar->biaya_obat,0,',','.') }}</td>
                            <td class="px-4 py-2">{{ $bayar->tgl_bayar }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('pembayaran.show', $bayar) }}" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded shadow">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-gray-500">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
