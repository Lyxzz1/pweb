<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                        @if($booking->status === 'confirmed')
                            <div class="flex justify-end space-x-4">
                                <!-- Tombol Batalkan Booking -->
                                <button type="button" 
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        id="delete-button-{{ $booking->id }}">
                                    Batalkan Booking
                                </button>

                                <!-- Form hidden untuk menghapus booking -->
                                <form id="delete-form-{{ $booking->id }}" 
                                    action="{{ route('booking.destroy', $booking->id) }}" 
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Tombol Bayar -->
                                <form action="{{ route('customer.payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                    <button type="submit" 
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Bayar
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script SweetAlert -->
    <script>
        document.getElementById('delete-button-{{ $booking->id }}').addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Booking akan dibatalkan dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-{{ $booking->id }}').submit();
                }
            });
        });
    </script>
</x-guest-layout>