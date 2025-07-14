<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('obat.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Obat
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($obats as $obat)
                            <tr>
                                <td class="px-6 py-4">{{ $obat->nama }}</td>
                                <td class="px-6 py-4">{{ $obat->stok }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('obat.edit', $obat) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded text-sm">Edit</a>
                                    <form action="{{ route('obat.destroy', $obat) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Data obat belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
