<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalAlternatif = Alternatif::count();
        $totalKriteria = Kriteria::count();

        // Assuming nilai is used to determine if the penilaian is complete or pending
        $penilaianSelesai = AlternatifKriteria::whereNotNull('nilai')->count();
        $penilaianPending = AlternatifKriteria::whereNull('nilai')->count();

        // Pass the data to the view
        return view('home', compact('totalAlternatif', 'totalKriteria', 'penilaianSelesai', 'penilaianPending'));
    }
}
