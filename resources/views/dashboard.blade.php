@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded p-6">
        <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-indigo-600 text-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Alternatif</h3>
                <p class="text-2xl">{{ $totalAlternatif }}</p>
            </div>
            <div class="bg-indigo-600 text-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Kriteria</h3>
                <p class="text-2xl">{{ $totalKriteria }}</p>
            </div>
            <div class="bg-indigo-600 text-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Penilaian Selesai</h3>
                <p class="text-2xl">{{ $penilaianSelesai }}</p>
            </div>
            <div class="bg-indigo-600 text-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Penilaian Pending</h3>
                <p class="text-2xl">{{ $penilaianPending }}</p>
            </div>
        </div>

        <div class="bg-white shadow-md rounded p-6 mt-6">
            <h3 class="text-xl font-semibold mb-4">Proses SAW</h3>
            <p>Metode Simple Additive Weighting (SAW) digunakan untuk mencari penjumlahan terbobot dari rating kinerja setiap alternatif pada semua atribut. Langkah-langkahnya adalah:</p>
            <ol class="list-decimal list-inside mt-2">
                <li>Menentukan kriteria yang akan dijadikan acuan dalam pengambilan keputusan.</li>
                <li>Memberikan bobot preferensi untuk setiap kriteria.</li>
                <li>Membuat matriks keputusan berdasarkan kriteria.</li>
                <li>Melakukan normalisasi matriks keputusan.</li>
                <li>Menghitung nilai akhir untuk setiap alternatif.</li>
            </ol>
        </div>
    </div>
</div>
@endsection
