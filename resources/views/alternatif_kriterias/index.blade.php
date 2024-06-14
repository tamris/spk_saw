@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl font-bold">Daftar Penilaian</h2>
        <a href="{{ route('alternatif_kriterias.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="bg-green-500 text-white py-2 px-4 rounded mb-4 relative">
        {{ $message }}
        <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 focus:outline-none" onclick="this.parentElement.style.display='none';">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L15.586 3 17 4.414 11.414 10 17 15.586 15.586 17 10 11.414 4.414 17 3 15.586 8.586 10 3 4.414 4.414 3z"/></svg>
        </button>
    </div>
    @endif

    <div class="overflow-x-auto">
        <table id="penilaian-table" class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border border-gray-300 py-3 px-6 text-center">No</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Nama Mahasiswa</th>
                    @foreach($kriterias as $kriteria)
                        <th class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                    <th class="border border-gray-300 py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifs as $index => $alternatif)
                <tr class="hover:bg-blue-100">
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 py-3 px-6">{{ $alternatif->nama }}</td>
                    @foreach($kriterias as $kriteria)
                        <td class="border border-gray-300 py-3 px-6 text-center">
                            @php
                                $alternatifKriteria = $alternatif->alternatifKriterias->firstWhere('kriteria_id', $kriteria->id);
                                $nilai = $alternatifKriteria->crips->nilai ?? '-';
                            @endphp
                            {{ $nilai }}
                        </td>
                    @endforeach
                    <td class="border border-gray-300 py-3 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('alternatif_kriterias.edit', $alternatif->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                            <button onclick="openModal({{ $alternatif->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl mb-4">Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
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

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<!-- Custom CSS -->
<style>
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1.5em;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 1em;
    }
    
</style>

<script>
    $(document).ready(function() {
        $('#penilaian-table').DataTable({
            "pagingType": "simple_numbers",
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            }
        });
    });

    function openModal(id) {
        document.getElementById('delete-form').action = '/alternatif_kriterias/' + id;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>
@endsection
