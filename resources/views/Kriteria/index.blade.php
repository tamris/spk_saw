@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Kriteria</h1>
        <a href="{{ route('kriteria.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-4">
            {{ $message }}
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border border-gray-300 py-3 px-6 text-center">No</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Kode Kriteria</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Nama Kriteria</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Bobot</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Jenis</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $index => $kriteria)
                <tr class="hover:bg-blue-100">
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->kode_kriteria }}</td>
                    <td class="border border-gray-300 py-3 px-6">{{ $kriteria->nama_kriteria }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->bobot }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->jenis }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('kriteria.show', $kriteria->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                            <button onclick="openModal({{ $kriteria->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl mb-4">Konfirmasi Penghapusan</h2>
            <p>Apakah Anda yakin ingin menghapus kriteria ini?</p>
            <div class="flex justify-end mt-4">
                <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                <form id="delete-form" action="" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script>
    function openModal(id) {
        document.getElementById('delete-form').action = '/kriteria/' + id;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>
@endsection
