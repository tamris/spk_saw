<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Crips;
use App\Models\AlternatifKriteria;
use Illuminate\Http\Request;

class AlternatifKriteriaController extends Controller
{
    //
    public function index()
    {
        $alternatifs = Alternatif::with(['alternatifKriterias.crips'])->get();
        $kriterias = Kriteria::all();
        return view('alternatif_kriterias.index', compact('alternatifs', 'kriterias'));
    }

    public function create()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('crips')->get();  // Load crips with kriteria

        return view('alternatif_kriterias.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'penilaian' => 'required|array',
            'penilaian.*.kriteria_id' => 'required|exists:kriterias,id',
            'penilaian.*.crips_id' => 'required|exists:crips,id',
        ]);

        // Proses penyimpanan data penilaian
        foreach ($request->penilaian as $penilaian) {
            AlternatifKriteria::create([
                'alternatif_id' => $request->alternatif_id,
                'kriteria_id' => $penilaian['kriteria_id'],
                'crips_id' => $penilaian['crips_id'],
                'nilai' => Crips::find($penilaian['crips_id'])->nilai,
            ]);
        }

        return redirect()->route('alternatif_kriterias.index')->with('success', 'Penilaian berhasil disimpan.');
    }

    public function edit($id)
    {
        $alternatifKriteria = AlternatifKriteria::where('alternatif_id', $id)->get();
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('crips')->get();

        return view('alternatif_kriterias.edit', compact('alternatifKriteria', 'alternatifs', 'kriterias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'penilaian' => 'required|array',
            'penilaian.*.kriteria_id' => 'required|exists:kriterias,id',
            'penilaian.*.crips_id' => 'required|exists:crips,id',
        ]);

        // Hapus data penilaian lama
        AlternatifKriteria::where('alternatif_id', $id)->delete();

        // Simpan data penilaian baru
        foreach ($request->penilaian as $penilaian) {
            AlternatifKriteria::create([
                'alternatif_id' => $request->alternatif_id,
                'kriteria_id' => $penilaian['kriteria_id'],
                'crips_id' => $penilaian['crips_id'],
                'nilai' => Crips::find($penilaian['crips_id'])->nilai,
            ]);
        }

        return redirect()->route('alternatif_kriterias.index')->with('success', 'Penilaian berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $alternatifKriteria = AlternatifKriteria::findOrFail($id);
        $alternatifKriteria->delete();

        return redirect()->route('alternatif_kriterias.index')
            ->with('success', 'Penilaian Alternatif Kriteria berhasil dihapus.');
    }
}
