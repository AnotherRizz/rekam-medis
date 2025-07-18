<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('pemeriksaan.pasien', 'pemeriksaan.obat')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

public function create(Request $request)
{
    // Ambil pemeriksaan yang belum memiliki pembayaran
    $pemeriksaans = Pemeriksaan::with('pasien', 'obat')
        ->whereDoesntHave('pembayaran') 
        ->get();

    $pemeriksaanTerpilih = null;

    if ($request->has('pemeriksaan_id')) {
        $pemeriksaanTerpilih = Pemeriksaan::with('pasien', 'obat')->find($request->pemeriksaan_id);
    }

    return view('pembayaran.create', compact('pemeriksaans', 'pemeriksaanTerpilih'));
}


public function store(Request $request)
{
    $request->validate([
        'pemeriksaan_id' => 'required|exists:pemeriksaans,id',
        'biaya_periksa' => 'required|numeric',
        'tgl_bayar' => 'required|date',
    ]);

    $pemeriksaan = Pemeriksaan::with('obat')->findOrFail($request->pemeriksaan_id);

    $biaya_obat = 0;
    if ($pemeriksaan->obat) {
        $biaya_obat = $pemeriksaan->obat->harga * $pemeriksaan->jumlah;

        // Kurangi stok obat
        if ($pemeriksaan->obat->stok >= $pemeriksaan->jumlah) {
            $pemeriksaan->obat->stok -= $pemeriksaan->jumlah;
            $pemeriksaan->obat->save();
        } else {
            return back()->with('error', 'Stok obat tidak mencukupi.');
        }
    }

    $lastId = Pembayaran::max('id') + 1;
    $kode_bayar = 'TRX' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

    Pembayaran::create([
        'kode_bayar' => $kode_bayar,
        'pemeriksaan_id' => $pemeriksaan->id,
        'biaya_periksa' => $request->biaya_periksa,
        'biaya_obat' => $biaya_obat,
        'tgl_bayar' => $request->tgl_bayar,
    ]);

    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan dan stok obat berkurang.');
}


    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('pemeriksaan.pasien', 'pemeriksaan.obat');
        return view('pembayaran.show', compact('pembayaran'));
    }
}