<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo dan Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logopweb.png') }}" alt="Logo" class="h-10  w-auto">
                    <!-- <span class="ml-2 text-xl font-bold text-gray-800">Sportstation</span> -->
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-600 transition duration-500 hover:text-red-500 {{ request()->is('/') ? 'text-red-500 font-semibold' : '' }}">
                    Home
                </a>
                <a href="lapangan" class="text-gray-600 transition duration-500 hover:text-red-500 {{ request()->routeIs('lapangan') ? 'text-red-500 font-semibold' : '' }}">
                    Lapangan
                </a>
                <a href="about" class="text-gray-600 transition duration-500 hover:text-red-500 {{ request()->routeIs('about') ? 'text-red-500 font-semibold' : '' }}">
                    About
                </a>
                <a href="contact" class="text-gray-600 transition duration-500 hover:text-red-500 {{ request()->routeIs('contact') ? 'text-red-500 font-semibold' : '' }}">
                    Contact
                </a>
                
                <!-- Authentication Links -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-150">
                            Dashboard
                        </a>
                    @else
                        <a href="login" class="text-gray-600 transition duration-300 hover:text-red-500">
                            Login
                        </a>
                        <a href="register" class="bg-red-500 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-red-600 transition duration-150">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-500 hover:bg-gray-50 {{ request()->is('/') ? 'text-red-500 bg-blue-50' : '' }}">
                Home
            </a>
            <a href="lapangan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-500 hover:bg-gray-50 {{ request()->routeIs('lapangan') ? 'text-red-500 bg-blue-50' : '' }}">
                Lapangan
            </a>
            <a href="about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-500 hover:bg-gray-50 {{ request()->routeIs('about') ? 'text-red-500 bg-blue-50' : '' }}">
                About
            </a>
            <a href="contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-500 hover:bg-gray-50 {{ request()->routeIs('contact') ? 'text-red-500 bg-blue-50' : '' }}">
                Contact
            </a>
            
            <!-- Mobile Authentication Links -->
            <div class="mt-4 pt-4 border-t border-gray-100">
                @auth
                    <a href="dashboard" class="block w-full text-center px-3 py-2 rounded-md text-base font-medium text-white bg-red-500 hover:bg-red-600">
                        Dashboard
                    </a>
                @else
                    <a href="login" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-500 hover:bg-gray-50">
                        Login
                    </a>
                    <a href="register" class="block mt-2 w-full text-center px-3 py-2 rounded-md text-base font-medium text-white bg-red-500 hover:bg-red-600">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Script untuk Mobile Menu -->
<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Menutup menu mobile saat mengklik di luar menu
    document.addEventListener('click', (event) => {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Menutup menu mobile saat mengklik link menu
    const mobileMenuLinks = mobileMenu.querySelectorAll('a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
</script>
