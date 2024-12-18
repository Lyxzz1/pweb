<x-guest-layout>
    <div class="min-h-screen pl-64 bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            @include('layouts.admin-sidebar')

            <!-- Main Content -->
            <div class="flex-1">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Lapangan Card -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">Total Lapangan</h3>
                                <p class="text-3xl font-bold">{{ $lapangan->count() }}</p>
                            </div>
                        </div>

                        <!-- Total Booking Card -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">Total Booking</h3>
                                <p class="text-3xl font-bold">{{ $totalBooking }}</p>
                            </div>
                        </div>

                        <!-- Total Pendapatan Card -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">Total Pendapatan</h3>
                                <p class="text-3xl font-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Lapangan -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4">Lapangan Terpopuler</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Booking</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($lapangan as $lap)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $lap->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $lap->bookings_count }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $lap->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $lap->status ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
