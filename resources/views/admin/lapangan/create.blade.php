<x-guest-layout>
    <div class="flex">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')

        <!-- Main Content -->
        <div class="flex-1 pl-72 p-8 bg-gray-100">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Tambah Lapangan</h2>
                    <a href="{{ route('admin.lapangan.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.lapangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">
                            Nama Lapangan
                        </label>
                        <input type="text" 
                               name="nama" 
                               id="nama" 
                               value="{{ old('nama') }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                  required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">
                            Harga per Jam
                        </label>
                        <input type="number" 
                               name="harga" 
                               id="harga" 
                               value="{{ old('harga') }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">
                            Gambar Lapangan
                        </label>
                        <input type="file" 
                               name="gambar" 
                               id="gambar"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               accept="image/lapangan*"
                               onchange="previewImage(event)">
                        <p class="text-gray-600 text-xs mt-1">Format: JPG, PNG, GIF (Max. 2MB)</p>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <img id="preview" src="#" alt="Preview" class="max-w-xs rounded-lg shadow-lg">
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan Lapangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk preview gambar -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                const previewDiv = document.getElementById('imagePreview');
                preview.src = reader.result;
                previewDiv.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-guest-layout>
