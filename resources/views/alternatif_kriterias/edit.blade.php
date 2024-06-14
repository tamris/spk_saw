@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Edit Penilaian Alternatif Kriteria</h2>
    <form action="{{ route('alternatif_kriterias.update', $alternatifKriteria[0]->alternatif_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="alternatif_id" class="block text-gray-700">Nama Siswa:</label>
            <select name="alternatif_id" id="alternatif_id" class="w-full mt-2 p-2 border rounded">
                @foreach($alternatifs as $alternatif)
                    <option value="{{ $alternatif->id }}" {{ $alternatifKriteria[0]->alternatif_id == $alternatif->id ? 'selected' : '' }}>{{ $alternatif->nama }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4 grid grid-cols-3 gap-4">
            @foreach($kriterias as $kriteria)
                @php
                    $selectedCrips = $alternatifKriteria->where('kriteria_id', $kriteria->id)->first();
                @endphp
                <div>
                    <label class="block text-gray-700">{{ $kriteria->nama_kriteria }}</label>
                    <select name="penilaian[{{ $loop->index }}][crips_id]" class="w-full mt-2 p-2 border rounded">
                        <option value="">Pilih</option>
                        @foreach($kriteria->crips as $crip)
                            <option value="{{ $crip->id }}" data-nilai="{{ $crip->nilai }}" 
                                {{ $selectedCrips && $selectedCrips->crips_id == $crip->id ? 'selected' : '' }}>
                                {{ $crip->nama }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="penilaian[{{ $loop->index }}][kriteria_id]" value="{{ $kriteria->id }}">
                </div>
            @endforeach
        </div>
        
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
    </form>
</div>
@endsection
