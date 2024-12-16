<x-guest-layout>
    <div class="flex h-screen bg-gray-100">
        @include('layouts.pelanggan-sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-semibold">Riwayat Booking</h2>
                            <a href="{{ route('booking.create') }}" 
                               class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Booking Baru
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lapangan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->lapangan->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->tanggal->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - 
                                                {{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                                       ($booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                                                        'bg-yellow-100 text-yellow-800') }}">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('booking.show', $booking->id) }}" 
                                                   class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Lihat
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center" colspan="6">
                                                Tidak ada booking
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 