<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
     public function index()
    {
        $pemeriksaans = Pemeriksaan::with('pasien', 'pembayaran')->get();
        return view('pemeriksaan.index', compact('pemeriksaans'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $obats = Obat::all();
        return view('pemeriksaan.create', compact('pasiens','obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'keluhan' => 'required',
            'riwayat_penyakit' => 'required',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'tgl_periksa' => 'required|date',
        ]);

        $lastId = Pemeriksaan::max('id') + 1;
        $no_periksa = 'RME' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

        Pemeriksaan::create([
            'pasien_id' => $request->pasien_id,
            'no_periksa' => $no_periksa,
            'keluhan' => $request->keluhan,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'tensi_darah' => $request->tensi_darah,
            'obat_id' => $request->obat_id,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'tgl_periksa' => $request->tgl_periksa,
        ]);

        return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil ditambahkan');
    }

    public function show(Pemeriksaan $pemeriksaan)
    {
        return view('pemeriksaan.show', compact('pemeriksaan'));
    }

    public function edit(Pemeriksaan $pemeriksaan)
    {
        $pasiens = Pasien::all();
         $obats = Obat::all();
        return view('pemeriksaan.edit', compact('pemeriksaan', 'pasiens','obats'));
    }

    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'keluhan' => 'required',
            'riwayat_penyakit' => 'required',
            'tensi_darah' => 'required',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'obat_id' => 'required',
            'jumlah' => 'required',
            'tgl_periksa' => 'required|date',
        ]);

        $pemeriksaan->update($request->only(['pasien_id', 'keluhan', 'riwayat_penyakit', 'bb','tensi_darah', 'tb','obat_id', 'jumlah', 'tgl_periksa']));

        return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil diperbarui');
    }

    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();
        return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil dihapus');
    }
}