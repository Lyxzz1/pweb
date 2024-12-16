<x-guest-layout>
    <div class="flex h-screen bg-gray-100">
        @include('layouts.pelanggan-sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Daftar Lapangan</h2>
                        <p class="text-gray-600 mt-2">Pilih lapangan yang ingin Anda booking</p>
                    </div>
                    
                    <!-- Form Pencarian -->
                    <form action="{{ route('lapangan.search') }}" method="GET" class="flex gap-2">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari lapangan..." 
                               class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                               value="{{ request('search') }}">
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- Lapangan Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if($lapangan->count() > 0)
                        @foreach($lapangan as $lap)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <!-- Gambar Lapangan -->
                                <div class="relative h-48">
                                    @if($lap->gambar)
                                        <img src="{{ asset('storage/' . $lap->gambar) }}" 
                                             alt="{{ $lap->nama }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Badge Status -->
                                    <div class="absolute top-2 right-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Tersedia
                                        </span>
                                    </div>
                                </div>

                                <!-- Informasi Lapangan -->
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $lap->nama }}</h3>
                                    <p class="text-gray-600 text-sm mb-4">{{ $lap->deskripsi }}</p>
                                    
                                    <!-- Harga dan Tombol Booking -->
                                    <div class="flex items-center justify-between">
                                        <div class="text-lg font-bold text-red-600">
                                            Rp {{ number_format($lap->harga, 0, ',', '.') }}/jam
                                        </div>
                                        <a href="{{ route('booking.create', ['lapangan_id' => $lap->id]) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-150">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Booking
                                        </a>
                                    </div>
                                </div>

                                <!-- Fasilitas atau Info Tambahan -->
                                <div class="px-4 py-3 bg-gray-50 border-t">
                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Buka 24 Jam</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Parkir Gratis</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">Tidak ada lapangan yang ditemukan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 