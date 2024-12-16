<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Sportstation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-[Poppins]">
    @include('layouts.navigation')
    
    <div class="pt-20">
        <!-- Hero Section -->
        <div class="bg-red-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold mb-4">Tentang Kami</h1>
                <p class="text-xl">Mengenal lebih dekat dengan Sportstation</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Visi Kami</h2>
                    <p class="text-gray-600 mb-4">
                        Menjadi platform booking lapangan olahraga terpercaya yang memudahkan masyarakat dalam berolahraga 
                        dan menjalani gaya hidup sehat.
                    </p>
                    <p class="text-gray-600">
                        Kami berkomitmen untuk terus berinovasi dan memberikan pelayanan terbaik bagi pengguna kami.
                    </p>
                </div>
                <!-- <div>
                    <img src="{{ asset('images/about-vision.jpg') }}" alt="Visi" class="rounded-lg shadow-lg">
                </div> -->
            </div>

            <!-- Values Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Nilai-Nilai Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Kepercayaan</h3>
                        <p class="text-gray-600">Membangun kepercayaan melalui transparansi dan pelayanan yang berkualitas.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Inovasi</h3>
                        <p class="text-gray-600">Terus berinovasi untuk memberikan pengalaman terbaik bagi pengguna.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Pelayanan</h3>
                        <p class="text-gray-600">Mengutamakan kepuasan pelanggan dalam setiap layanan kami.</p>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div>
                <h2 class="text-3xl font-bold mb-8 text-center">Tim Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Team Member 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="{{ asset('images/team-1.jpeg') }}"  alt="Member 1" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold mb-1">Ega Felix</h3>
                        <p class="text-gray-600">CEO & Founder</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="{{ asset('images/team-1.jpeg') }}" alt="Member 2" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold mb-1">Moh. Rifki</h3>
                        <p class="text-gray-600">CEO & Founder</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="{{ asset('images/team-1.jpeg') }}" alt="Member 3" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold mb-1">Muhammad Agil</h3>
                        <p class="text-gray-600">CEO & Founder</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="{{ asset('images/alga.jpg') }}" alt="Member 4" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                        <h3 class="text-xl font-semibold mb-1">Achmad Yusuf</h3>
                        <p class="text-gray-600">CEO & Founder</p>
                    </div>
                    <!-- Tambahkan anggota tim lainnya sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')

</body>
</html> 