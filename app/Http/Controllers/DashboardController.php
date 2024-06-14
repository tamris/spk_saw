<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $totalAlternatif = Alternatif::count();
        $totalKriteria = Kriteria::count();

        // Assuming nilai is used to determine if the penilaian is complete or pending
        $penilaianSelesai = AlternatifKriteria::whereNotNull('nilai')->count();
        $penilaianPending = AlternatifKriteria::whereNull('nilai')->count();

        // Pass the data to the view
        return view('dashboard', compact('totalAlternatif', 'totalKriteria', 'penilaianSelesai', 'penilaianPending'));
    }
}
