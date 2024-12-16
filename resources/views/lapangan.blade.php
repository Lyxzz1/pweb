<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan - Sportstation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-[Poppins]">
    <!-- Navigation -->
    @include('layouts.navigation')
    
    <!-- Main Content -->
    <div class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Daftar Lapangan</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan lapangan olahraga yang sesuai dengan kebutuhan Anda. 
                    Daftar sekarang untuk melakukan booking!
                </p>
            </div>

            <!-- Lapangan Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($lapangan as $lap)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
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
                        </div>

                        <!-- Informasi Lapangan -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $lap->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ $lap->deskripsi }}</p>
                            
                            <!-- Harga dan CTA -->
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-red-600">
                                    Rp {{ number_format($lap->harga, 0, ',', '.') }}/jam
                                </div>
                                <a href="{{ route('register') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-150">
                                    Booking
                                </a>
                            </div>
                        </div>

                        <!-- Fasilitas -->
                        <div class="px-6 py-4 bg-gray-50 border-t">
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
            </div>

            <!-- CTA Section -->
            <div class="mt-16 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Siap untuk Booking?</h2>
                <p class="text-gray-600 mb-8">Daftar sekarang dan nikmati kemudahan booking lapangan olahraga</p>
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg text-lg transition-colors duration-150">
                    Daftar Sekarang
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')


    <!-- Mobile Menu Script -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
