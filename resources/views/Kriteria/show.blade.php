@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-4 relative">
            {{ $message }}
            <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 focus:outline-none" onclick="this.parentElement.style.display='none';">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L15.586 3 17 4.414 11.414 10 17 15.586 15.586 17 10 11.414 4.414 17 3 15.586 8.586 10 3 4.414 4.414 3z"/></svg>
            </button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold mb-4">Detail Kriteria: {{ $kriteria->nama_kriteria }}</h2>
        <button onclick="window.history.back();" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</button>
    </div>

    <div class="flex space-x-4">
        <!-- Form Input Crips -->
        <div class="w-1/3 bg-white p-6 rounded shadow-md">
            <h3 class="text-xl font-semibold mb-4">Tambah Crips</h3>
            <form action="{{ route('crips.store', $kriteria->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Crips</label>
                    <input type="text" name="nama" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nilai</label>
                    <input type="number" name="nilai" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Tabel Crips -->
        <div class="w-2/3 bg-white p-6 rounded shadow-md">
            <h3 class="text-xl font-semibold mb-4">Daftar Crips</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2 text-left">No</th>
                        <th class="border p-2 text-left">Nama</th>
                        <th class="border p-2 text-left">Nilai</th>
                        <th class="border p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria->crips as $index => $crip)
                    <tr>
                        <td class="border p-2">{{ $index + 1 }}</td>
                        <td class="border p-2">{{ $crip->nama }}</td>
                        <td class="border p-2">{{ $crip->nilai }}</td>
                        <td class="border p-2">
                            <button onclick="showModal('{{ route('crips.destroy', $crip->id) }}')" class="text-red-500 hover:text-red-700" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="{{ route('crips.edit', [$kriteria->id, $crip->id]) }}" class="text-blue-500 hover:text-blue-700 ml-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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

<script>
    function showModal(action) {
        document.getElementById('delete-form').action = action;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>
@endsection
