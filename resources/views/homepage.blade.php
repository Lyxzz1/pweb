<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportstation - Booking Lapangan Olahraga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font -->
     <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 font-[Poppins]">  
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section id="home" class="pt-12">
        <div class="relative bg-gradient-to-r from-black to-white h-[700px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="w-full md:w-1/2 text-white">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6">
                            Booking Lapangan Olahraga Jadi Lebih Mudah
                        </h1>
                        <p class="text-lg mb-8">
                            Temukan dan booking lapangan olahraga favoritmu dengan mudah dan cepat.
                            Tersedia berbagai jenis lapangan dengan harga terbaik.
                        </p>
                        <div class="space-x-4">
                            <a href="{{ route('register') }}" 
                               class="bg-white text-red-600 px-6 py-3 rounded-md font-semibold hover:bg-gray-100">
                                Daftar Sekarang
                            </a>
                            <a href="#lapangan" 
                               class="border-2 border-white text-white px-6 py-3 rounded-md font-semibold transition duration-500 hover:bg-white hover:text-red-600">
                                Lihat Lapangan
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block w-1/2">
                        <img src="https://cdn.pixabay.com/photo/2015/03/26/22/13/football-693510_960_720.jpg" alt="Hero" class="w-full h-auto rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div data-aos="zoom-in" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-gray-600">Nikmati berbagai keuntungan booking lapangan bersama kami</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6">
                    <div class="bg-red-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Booking 24/7</h3>
                    <p class="text-gray-600">Lakukan booking kapan saja dan dimana saja</p>
                </div>
                <!-- Feature 2 -->
                <div class="text-center p-6">
                    <div class="bg-red-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Mudah dan Aman</h3>
                    <p class="text-gray-600">Proses booking yang mudah dengan sistem yang aman</p>
                </div>
                <!-- Feature 3 -->
                <div class="text-center p-6">
                    <div class="bg-red-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pelayanan Terbaik</h3>
                    <p class="text-gray-600">Customer service yang siap membantu Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lapangan Section -->
    <section id="lapangan" class="py-20 bg-gray-100">
        <div data-aos="fade-up" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Lapangan Kami</h2>
                <p class="text-gray-600">Pilih lapangan sesuai dengan kebutuhan Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
                @foreach($lapangan as $lap)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-500 hover:shadow-2xl">
                    <img src="{{ asset('storage/' . $lap->gambar) }}" alt="{{ $lap->nama }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $lap->nama }}</h3>
                        <p class="text-gray-600 mb-4">{{ $lap->deskripsi }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-red-600 font-bold">Rp {{ number_format($lap->harga, 0, ',', '.') }}/jam</span>
                            @auth
                                <a href="{{ route('booking.create', ['lapangan_id' => $lap->id]) }}" 
                                   class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                    Booking
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="bg-red-500 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-red-600">
                                    Login untuk Booking
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Sportstation</h2>
                    <p class="text-gray-600 mb-6">
                        Sportstation adalah platform booking lapangan olahraga online yang memudahkan Anda untuk menemukan dan memesan lapangan olahraga favorit. 
                        Kami berkomitmen untuk memberikan pengalaman booking yang mudah, aman, dan nyaman bagi seluruh pelanggan.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Dengan berbagai pilihan lapangan dan sistem booking yang terintegrasi, 
                        kami memastikan setiap pelanggan mendapatkan pelayanan terbaik untuk kebutuhan olahraga mereka.
                    </p>
                    <div class="grid grid-cols-2 gap-6 text-center pt-6">
                        <div>
                            <h4 class="text-3xl font-bold text-red-600">1000+</h4>
                            <p class="text-gray-600">Pelanggan Puas</p>
                        </div>
                        <div>
                            <h4 class="text-3xl font-bold text-red-600">500+</h4>
                            <p class="text-gray-600">Booking Sukses</p>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://cdn.pixabay.com/photo/2015/05/13/16/20/futsal-765721_640.jpg" alt="About" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <p class="text-gray-600">Ada pertanyaan? Jangan ragu untuk menghubungi kami</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-red-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Alamat</h4>
                                    <p class="text-gray-600">Jl. Kalimantan No.67, Jember, Jawa Timur</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-red-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Telepon</h4>
                                    <p class="text-gray-600">+62 123 4567 890</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-red-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Email</h4>
                                    <p class="text-gray-600">sportstation@mail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-4">Kirim Pesan</h3>
                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                                <input type="text" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Pesan</label>
                                <textarea id="message" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-red-600">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi dalam milidetik
        easing: 'ease-in-out', // Efek easing
        once: false // Animasi hanya berjalan sekali
    });
</script>
</html>