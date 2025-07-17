<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
public function index(Request $request)
{
    $query = Pasien::query();

    if ($request->filled('search')) {
        $query->where('no_pasien', 'like', "%{$request->search}%")
              ->orWhere('nama', 'like', "%{$request->search}%")
              ->orWhere('alamat', 'like', "%{$request->search}%")
              ->orWhere('no_tlp', 'like', "%{$request->search}%");
    }

    // Default sort by no_pasien jika tidak ada sort_by dari request
    $sortBy = $request->get('sort_by', 'no_pasien');
    $order = $request->get('order', 'asc');

    $query->orderBy($sortBy, $order);

    $pasiens = $query->get();

    return view('pasien.index', compact('pasiens', 'sortBy', 'order'));
}



    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_tlp' => 'required'
        ]);

        // Generate nomor pasien otomatis
        $lastId = Pasien::max('id') + 1;
        $no_pasien = 'P' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

         // Simpan data pasien
        Pasien::create([
            'no_pasien' => $no_pasien,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_tlp' => $request->no_tlp
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Ditambahkan');
    }
  public function show(Pasien $pasien)
{
    $pasien->load('pemeriksaans');
    return view('pasien.show', compact('pasien'));
}



    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_tlp' => 'required'
        ]);

        $pasien->update($request->only(['nama', 'alamat', 'tgl_lahir', 'no_tlp']));

        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Diupdate');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Dihapus');
    }
}