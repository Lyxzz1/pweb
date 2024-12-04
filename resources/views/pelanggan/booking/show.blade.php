<x-guest-layout>
    <div class="flex">
        @include('layouts.pelanggan-sidebar')

        <div class="flex-1 p-8 bg-gray-100">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Detail Booking</h2>
                        <a href="{{ route('booking.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>

                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <p class="text-sm text-gray-600">Status</p>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                   ($booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                                    'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>

                        <div class="border-b pb-4">
                            <p class="text-sm text-gray-600">Lapangan</p>
                            <p class="text-lg font-medium">{{ $booking->lapangan->nama }}</p>
                        </div>

                        <div class="border-b pb-4">
                            <p class="text-sm text-gray-600">Tanggal</p>
                            <p class="text-lg font-medium">{{ $booking->tanggal->format('d F Y') }}</p>
                        </div>

                        <div class="border-b pb-4">
                            <p class="text-sm text-gray-600">Waktu</p>
                            <p class="text-lg font-medium">
                                {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - 
                                {{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}
                            </p>
                        </div>

                        <div class="border-b pb-4">
                            <p class="text-sm text-gray-600">Total Harga</p>
                            <p class="text-lg font-medium">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                        </div>

                        @if($booking->catatan)
                            <div class="border-b pb-4">
                                <p class="text-sm text-gray-600">Catatan</p>
                                <p class="text-lg font-medium">{{ $booking->catatan }}</p>
                            </div>
                        @endif

                        @if($booking->status === 'pending')
                            <div class="flex justify-end space-x-4">
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?')">
                                        Batalkan Booking
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 