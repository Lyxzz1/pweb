<x-guest-layout>
    <head>
        <title>Bayar Booking</title>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <div class="flex min-h-screen bg-gray-100">
        @include('layouts.pelanggan-sidebar')

        <div class="flex-1 p-8 bg-white">
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-700">Proses Pembayaran</h2>
                    <a href="{{ route('booking.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

                <!-- Detail Informasi Booking -->
                <div class="space-y-4">
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
                </div>

                <!-- Tombol Bayar -->
                <div class="mt-6 text-center">
                    <button id="pay-button" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Midtrans -->
    <script type="text/javascript">
        let snapToken = "{{ $snapToken }}";
        let payButton = document.getElementById('pay-button');
        payButton.onclick = function () {
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log(result);
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pembayaran Anda telah berhasil.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('booking.index') }}";
                    });
                },
                onPending: function (result) {
                    console.log(result);
                    Swal.fire({
                        title: 'Pending!',
                        text: 'Pembayaran Anda masih dalam proses. Silakan cek statusnya nanti.',
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                },
                onError: function (result) {
                    console.log(result);
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Pembayaran gagal. Silakan coba lagi atau hubungi admin.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        };
    </script>
</x-guest-layout>
