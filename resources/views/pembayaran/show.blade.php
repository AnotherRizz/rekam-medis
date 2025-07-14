<x-app-layout>
    <x-slot name="header">Detail Pembayaran</x-slot>

    <div class="max-w-md mx-auto bg-white p-6 rounded shadow text-gray-700 space-y-4 border" id="struk">
        <h2 class="text-center text-xl font-bold mb-4 border-b pb-2">Klinik Sehat</h2>

        <div class="text-sm space-y-1">
            <p><strong>Kode Pembayaran:</strong> {{ $pembayaran->kode_bayar }}</p>
            <p><strong>Tanggal Bayar:</strong> {{ $pembayaran->tgl_bayar }}</p>
        </div>

        <div class="border-t pt-2 text-sm space-y-1">
            <p><strong>Pasien:</strong> {{ $pembayaran->pemeriksaan->pasien->nama }}</p>
            <p><strong>Obat:</strong> {{ $pembayaran->pemeriksaan->obat->nama ?? '-' }}</p>
            <p><strong>Jumlah Obat:</strong> {{ $pembayaran->pemeriksaan->jumlah }}</p>
        </div>

        <div class="border-t pt-2 text-sm space-y-1">
            <p><strong>Biaya Periksa:</strong> Rp {{ number_format($pembayaran->biaya_periksa,0,',','.') }}</p>
            <p><strong>Biaya Obat:</strong> Rp {{ number_format($pembayaran->biaya_obat,0,',','.') }}</p>
            <p class="font-semibold border-t pt-2 text-lg text-right">
                Total: Rp {{ number_format($pembayaran->biaya_periksa + $pembayaran->biaya_obat,0,',','.') }}
            </p>
        </div>

        <div class="border-t pt-4 text-center text-xs text-gray-500">
            Terima kasih telah melakukan pembayaran.<br>
            Semoga lekas sembuh!
        </div>
    </div>

    <div class="mt-4 flex justify-between max-w-md mx-auto">
        <a href="{{ route('pembayaran.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        <button onclick="printStruk()" class="bg-green-600 text-white px-4 py-2 rounded shadow">Cetak Struk</button>
    </div>

    <script>
        function printStruk() {
            var printContents = document.getElementById('struk').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload(); // reload halaman setelah print
        }
    </script>
</x-app-layout>
