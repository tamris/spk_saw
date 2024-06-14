@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-semibold mb-6">Edit Mahasiswa</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <input type="text" name="nama" id="nama" value="{{ $alternatif->nama }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror">
                @error('nama')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nim">
                    NIM
                </label>
                <input type="text" name="nim" id="nim" value="{{ $alternatif->nim }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nim') border-red-500 @enderror">
                @error('nim')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{ $alternatif->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                @error('email')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_kelamin">
                    Jenis Kelamin
                </label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="shadow border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="">{{ $alternatif->jenis_kelamin }}</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="jurusan" class="block text-gray-700">Jurusan</label>
            <select name="jurusan" id="jurusan" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jurusan') border-red-500 @enderror">
                <option value="">Pilih Jurusan</option>
                <option value="Teknik Informatika" {{ $alternatif->jurusan == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="Sistem Informasi" {{ $alternatif->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                <option value="Teknik Komputer" {{ $alternatif->jurusan == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                <!-- Tambahkan opsi jurusan lainnya sesuai kebutuhan -->
            </select>
            @error('jurusan')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="semester">
                    Semester
                </label>
                <input type="text" name="semester" id="semester" value="{{ $alternatif->semester }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('semester') border-red-500 @enderror">
                @error('semester')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
                <a href="{{ route('alternatif.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
