<div class="flex flex-col h-screen bg-gray-800 w-64">
    <!-- Logo -->
    <div class="flex items-center justify-center h-20 bg-gray-900">
        <img src="{{ asset('images/logopweb.png') }}" alt="Logo" class="h-8  w-40">
        <!-- <span class="text-white text-2xl font-semibold">Sportstation</span> -->
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-2 px-4">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md {{ request()->routeIs('dashboard') ? 'bg-red-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Lapangan -->
            <li>
                <a href="{{ route('lapangan.index') }}" 
                   class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md {{ request()->routeIs('lapangan.*') ? 'bg-red-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="mx-4 font-medium">Lapangan</span>
                </a>
            </li>

            <!-- Booking -->
            <li>
                <a href="{{ route('booking.index') }}" 
                   class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md {{ request()->routeIs('booking.*') ? 'bg-red-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Booking Saya</span>
                </a>
            </li>

            {{-- <!-- Lapangan -->
            <li>
                <a href="{{ route('booking.create') }}" 
                   class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="mx-4 font-medium">Booking Baru</span>
                </a>
            </li> --}}

            <!-- Profile -->
            <li>
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md {{ request()->routeIs('profile.edit') ? 'bg-red-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="mx-4 font-medium">Profile</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout -->
    <div class="p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="button" 
                    onclick="openLogoutModal()"
                    class="flex items-center px-4 py-2 text-gray-200 transition duration-300 hover:bg-gray-700 rounded-md w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="mx-4 font-medium">Logout</span>
            </button>
        </form>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" 
         class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden"
         style="z-index: 1000;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Logout</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin keluar dari sistem?
                    </p>
                </div>
                <div class="flex justify-center gap-4 mt-4">
                    <button type="button" 
                            onclick="closeLogoutModal()"
                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Tidak
                    </button>
                    <button type="button" 
                            onclick="document.querySelector('form').submit()"
                            class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Ya, Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Modal -->
<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }

    // Menutup modal jika user mengklik area di luar modal
    window.onclick = function(event) {
        const modal = document.getElementById('logoutModal');
        if (event.target == modal) {
            closeLogoutModal();
        }
    }

    // Menutup modal dengan tombol ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeLogoutModal();
        }
    });
</script> 