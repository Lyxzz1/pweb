<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="flex">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')

        <!-- Main Content -->
        <div class="flex-1  pl-72 p-6 bg-gray-100">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Daftar Lapangan</h2>
                    <a href="{{ route('admin.lapangan.create') }}" 
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Tambah Lapangan
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($lapangan as $lap)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lap->nama }}</td>
                                    <td class="px-6 py-4">{{ Str::limit($lap->deskripsi, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($lap->harga, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($lap->gambar)
                                            <img src="{{ asset('images/lapangan/'.$lap->gambar) }}" 
                                                 alt="{{ $lap->nama }}" 
                                                 class="h-10 w-10 rounded-full">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.lapangan.edit', $lap->id) }}" 
                                           class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                           <form action="{{ route('admin.lapangan.destroy', $lap->id) }}" method="POST" id="delete-form-{{ $lap->id }}" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="confirmDelete({{ $lap->id }}, '{{ $lap->nama }}')">
                                                    Hapus
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data lapangan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Anda akan menghapus lapangan "${name}". Tindakan ini tidak dapat dibatalkan!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>
</x-guest-layout> 