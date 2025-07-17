<x-app-layout>
    <x-slot name="header">Data Pasien</x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="mb-4 flex justify-between items-center">
            <form method="GET" action="{{ route('pasien.index') }}" class="flex space-x-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pasien..."
                    class="border rounded p-2 text-sm text-gray-700" />
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Cari</button>
            </form>

            <a href="{{ route('pasien.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                + Tambah Pasien
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded shadow mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">
                            <a href="{{ route('pasien.index', array_merge(request()->all(), ['sort_by' => 'no_pasien', 'order' => ($sortBy == 'no_pasien' && $order == 'asc') ? 'desc' : 'asc'])) }}">
                                No Pasien {!! $sortBy == 'no_pasien' ? ($order == 'asc' ? '↑' : '↓') : '' !!}
                            </a>
                        </th>
                        <th class="px-4 py-2">
                            <a href="{{ route('pasien.index', array_merge(request()->all(), ['sort_by' => 'nama', 'order' => ($sortBy == 'nama' && $order == 'asc') ? 'desc' : 'asc'])) }}">
                                Nama {!! $sortBy == 'nama' ? ($order == 'asc' ? '↑' : '↓') : '' !!}
                            </a>
                        </th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Tgl Lahir</th>
                        <th class="px-4 py-2">No Telepon</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($pasiens as $index => $pasien)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $pasien->no_pasien }}</td>
                            <td class="px-4 py-2">{{ $pasien->nama }}</td>
                            <td class="px-4 py-2">{{ $pasien->alamat }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $pasien->no_tlp }}</td>
                            <td class="px-4 py-2 space-x-1">
                                <a href="{{ route('pasien.show', $pasien) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded">Detail</a>
                                <a href="{{ route('pasien.edit', $pasien) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">Belum ada data pasien.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
