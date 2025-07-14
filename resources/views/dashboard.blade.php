<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow flex flex-col md:flex-row items-center gap-6">
                
                <div class="md:w-1/2">
                    <img src="{{ asset('img/banner.png') }}" alt="Dashboard Banner" class="w-full h-auto rounded-lg shadow">
                </div>

                <div class="md:w-1/2 space-y-4 text-gray-700">
                    <h3 class="text-2xl font-bold">Selamat Datang di Sistem Rekam Medis</h3>
                    <p>
                        Kelola data pasien, catat riwayat pemeriksaan, pantau stok obat, dan proses pembayaran dengan mudah dan cepat melalui sistem ini.
                    </p>

                    <ul class="list-disc list-inside space-y-1 text-sm">
                        <li>👥 Kelola informasi lengkap pasien</li>
                        <li>🩺 Riwayat dan detail pemeriksaan</li>
                        <li>💊 Manajemen stok obat</li>
                        <li>💳 Pembayaran pemeriksaan & obat</li>
                    </ul>

                    <a href="{{ route('pasien.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">
                        Kelola Pasien Sekarang
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
