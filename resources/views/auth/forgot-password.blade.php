<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sportstation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-[Poppins]">
    @include('layouts.navigation')

    <div class="min-h-screen pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Lupa Password Anda?</h2>
                    <p class="mt-2 text-gray-600">Masukkan email Anda untuk mengatur ulang password.</p>
                </div>

                <!-- Forgot Password Card -->
                <div class="bg-white rounded-xl shadow-md p-8">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="text-sm font-medium text-red-600">
                                Whoops! Ada kesalahan dalam input Anda.
                            </div>
                            <ul class="mt-2 text-sm text-red-600 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                                   placeholder="Masukkan email Anda">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                            Kirim Link Reset Password
                        </button>
                    </form>

                    <!-- Back to Login -->
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Sudah ingat password Anda?
                        <a href="{{ route('login') }}" class="font-medium text-red-500 hover:text-red-600">
                            Kembali ke Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
