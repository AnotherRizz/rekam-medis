<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
   public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_tlp' => 'required'
        ]);

        $lastId = Pasien::max('id') + 1;
        $no_pasien = 'P' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

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