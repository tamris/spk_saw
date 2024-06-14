@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-4">Edit Crips: {{ $crip->nama }}</h1>
    
    <form action="{{ route('kriteria.crips.update', [$kriteria->id, $crip->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Crips:</label>
            <input type="text" name="nama" id="nama" value="{{ $crip->nama }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        
        <div class="mb-4">
            <label for="nilai" class="block text-gray-700 text-sm font-bold mb-2">Nilai:</label>
            <input type="number" name="nilai" id="nilai" value="{{ $crip->nilai }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Crips</button>
        <button type="button" onclick="window.history.back();" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</button>
        </div>
    </form>
</div>
@endsection
