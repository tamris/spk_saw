<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    //// Menampilkan form penambahan kriteria
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric|min:0|max:5',
            'jenis' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria created successfully.');
    }

    public function show($id)
    {
        $kriteria = Kriteria::with('crips')->findOrFail($id);
        return view('kriteria.show', compact('kriteria'));
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric|min:0|max:5',
            'jenis' => 'required|in:benefit,cost',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria updated successfully.');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria deleted successfully.');
    }
}
