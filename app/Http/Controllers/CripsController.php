<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    public function store(Request $request, $kriteria_id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric',
        ]);

        // Buat crips baru
        $crips = new Crips();
        $crips->kriteria_id = $kriteria_id;
        $crips->nama = $request->input('nama');
        $crips->nilai = $request->input('nilai');
        $crips->save();

        // Redirect kembali ke halaman show kriteria dengan pesan sukses
        return redirect()->route('kriteria.show', $kriteria_id)->with('success', 'Crips berhasil ditambahkan.');
    }

    public function edit($kriteria_id, $crip_id)
    {
        $kriteria = Kriteria::findOrFail($kriteria_id);
        $crip = Crips::findOrFail($crip_id);
        return view('crips.edit', compact('kriteria', 'crip'));
    }

    public function update(Request $request, $kriteria_id, $crip_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric',
        ]);

        $crip = Crips::findOrFail($crip_id);
        $crip->nama = $request->input('nama');
        $crip->nilai = $request->input('nilai');
        $crip->save();

        return redirect()->route('kriteria.show', $kriteria_id)->with('success', 'Crips berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $crip = Crips::findOrFail($id);
        $kriteriaId = $crip->kriteria_id;
        $crip->delete();

        return redirect()->route('kriteria.show', $kriteriaId)->with('success', 'Crips berhasil dihapus.');
    }
}
