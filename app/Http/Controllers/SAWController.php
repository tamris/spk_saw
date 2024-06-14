<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\Normalisasi;
use Illuminate\Http\Request;

class SAWController extends Controller
{
    //
    public function normalisasi()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $matrix = [];
        $normalisasi = [];
    
        // Buat matriks keputusan awal
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $ak = AlternatifKriteria::where('alternatif_id', $alternatif->id)
                                         ->where('kriteria_id', $kriteria->id)
                                         ->first();
                $matrix[$alternatif->id][$kriteria->id] = $ak->nilai;
            }
        }
    
    
        // Ambil nilai max dan min untuk setiap kriteria
        $maxValues = [];
        $minValues = [];
        foreach ($kriterias as $kriteria) {
            $nilaiArray = array_column($matrix, $kriteria->id);
            $maxValues[$kriteria->id] = max(array_column($matrix, $kriteria->id));
            $minValues[$kriteria->id] = min(array_column($matrix, $kriteria->id));
        }

       
    
        // Normalisasi
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                if ($kriteria->jenis == 'Benefit') {
                    $normalisasi[$alternatif->id][$kriteria->id] = $matrix[$alternatif->id][$kriteria->id] / $maxValues[$kriteria->id];
                } else {
                    $normalisasi[$alternatif->id][$kriteria->id] = $minValues[$kriteria->id] / $matrix[$alternatif->id][$kriteria->id];
                }
    
                // Simpan ke tabel normalisasi
                Normalisasi::updateOrCreate(
                    ['alternatif_id' => $alternatif->id, 'kriteria_id' => $kriteria->id],
                    ['nilai' => $normalisasi[$alternatif->id][$kriteria->id]]
                );
            }
        }

        
       
    
        // Hitung nilai akhir
        $hasil = [];
        foreach ($alternatifs as $alternatif) {
            $total = 0;
            foreach ($kriterias as $kriteria) {
                $total += $normalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
            }
            $hasil[$alternatif->id] = $total;
        }
     
        arsort($hasil);

        return view('saw.normalisasi', compact('alternatifs', 'kriterias', 'normalisasi', 'hasil'));
    }
}
