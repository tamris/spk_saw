@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <h2 class="text-2xl font-semibold mb-4">Matriks Normalisasi</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm mb-8">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border border-gray-300 py-3 px-6 text-left">NIM</th>
                    <th class="border border-gray-300 py-3 px-6 text-left">Alternatif</th>
                    @foreach ($kriterias as $kriteria)
                        <th class="border border-gray-300 py-3 px-6 text-left">{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifs as $alternatif)
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-3 px-6">{{ $alternatif->nim }}</td>
                        <td class="border border-gray-300 py-3 px-6">{{ $alternatif->nama }}</td>
                        @foreach ($kriterias as $kriteria)
                            <td class="border border-gray-300 py-3 px-6 text-left">{{ number_format($normalisasi[$alternatif->id][$kriteria->id], 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-semibold mb-4">Nilai Preferensi</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border border-gray-300 py-3 px-6 text-left">No</th>
                    <th class="border border-gray-300 py-3 px-6 text-left">NIM</th>
                    <th class="border border-gray-300 py-3 px-6 text-left">Alternatif</th>
                    <th class="border border-gray-300 py-3 px-6 text-left">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @php $rank = 1; @endphp
                @foreach ($hasil as $alternatifId => $nilaiAkhir)
                    @php $alternatif = $alternatifs->find($alternatifId); @endphp
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-3 px-6">{{ $rank++ }}</td>
                        <td class="border border-gray-300 py-3 px-6">{{ $alternatif->nim }}</td>
                        <td class="border border-gray-300 py-3 px-6">{{ $alternatif->nama }}</td>
                        <td class="border border-gray-300 py-3 px-6 text-left">{{ number_format($nilaiAkhir, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
