<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">Sportstation</div>
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="{{ route('lapangan.index') }}" class="text-gray-600 hover:text-gray-800">Lapangan</a>
                @auth
                    <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-800">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Lapangan Section -->
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Daftar Lapangan</h2>
        <div class="flex flex-wrap -mx-4">
            @foreach($lapangan as $l)
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <img src="{{ asset('storage/' . $l->gambar) }}" alt="{{ $l->nama }}" class="w-full h-48 object-cover rounded mb-4">
                        <h3 class="text-xl font-bold mb-2">{{ $l->nama }}</h3>
                        <p class="text-gray-600 mb-4">{{ $l->deskripsi }}</p>
                        <p class="text-gray-800 font-bold mb-4">Rp {{ number_format($l->harga_per_jam, 0, ',', '.') }}/jam</p>
                        @auth
                            <a href="{{ route('lapangan.pesan', $l->id) }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Pesan Sekarang</a>
                        @else
                            <a href="{{ route('register') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Daftar untuk Memesan</a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <p>&copy; 2023 Sportstation. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="text-white hover:text-gray-400">Privacy Policy</a>
                <a href="#" class="text-white hover:text-gray-400">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>