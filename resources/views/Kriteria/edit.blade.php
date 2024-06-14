@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Kriteria</h2>

    @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ $message }}
        </div>
    @endif

    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_kriteria" class="block text-gray-700">Kode Kriteria</label>
            <input type="text" name="kode_kriteria" id="kode_kriteria" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('kode_kriteria') border-red-500 @enderror" value="{{ $kriteria->kode_kriteria }}">
            @error('kode_kriteria')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_kriteria" class="block text-gray-700">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('nama_kriteria') border-red-500 @enderror" value="{{ $kriteria->nama_kriteria }}">
            @error('nama_kriteria')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bobot" class="block text-gray-700">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('bobot') border-red-500 @enderror" value="{{ $kriteria->bobot }}" step="0.1" min="0" max="0.5">
            @error('bobot')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jenis" class="block text-gray-700">Jenis Kriteria</label>
            <select name="jenis" id="jenis" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('jenis') border-red-500 @enderror">
                <option value="benefit" {{ $kriteria->jenis == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ $kriteria->jenis == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
            @error('jenis')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
