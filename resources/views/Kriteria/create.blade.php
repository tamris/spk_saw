@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Tambah Kriteria</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kriteria.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="kode_kriteria" class="block text-gray-700">Kode Kriteria</label>
            <input type="text" name="kode_kriteria" id="kode_kriteria" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('kode_kriteria') border-red-500 @enderror" value="{{ old('kode_kriteria') }}">
            @error('kode_kriteria')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_kriteria" class="block text-gray-700">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('nama_kriteria') border-red-500 @enderror" value="{{ old('nama_kriteria') }}">
            @error('nama_kriteria')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bobot" class="block text-gray-700">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('bobot') border-red-500 @enderror" value="{{ old('bobot') }}" step="0.1" min="0" max="0.5">
            @error('bobot')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jenis" class="block text-gray-700">Jenis Kriteria</label>
            <select name="jenis" id="jenis" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('jenis') border-red-500 @enderror">
                <option value="">Pilih Jenis</option>
                <option value="benefit" {{ old('jenis') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ old('jenis') == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
            @error('jenis')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah
            </button>
            <a href="{{ route('kriteria.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
