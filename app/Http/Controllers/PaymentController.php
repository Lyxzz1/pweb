<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pelanggan.payment');
    }

    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Proses pembayaran Midtrans
     */
    public function pay(Request $request)
    {
        // Validasi data booking dari request
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
        ]);

        // Ambil data booking berdasarkan ID
        $booking = Booking::find($request->booking_id);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        // Konfigurasi parameter pembayaran
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $booking->id,
                'gross_amount' => $booking->total_harga,
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
            ],
            'item_details' => [
                [
                    'id' => $booking->lapangan_id,
                    'price' => $booking->total_harga,
                    'quantity' => 1,
                    'name' => 'Lapangan Booking ID ' . $booking->lapangan_id,
                ],
            ],
        ];

        // Buat Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        return view('pelanggan.payment', [
        'snapToken' => $snapToken,
        'booking' => $booking,
        ]);
    }

    /**
     * Callback Midtrans untuk update status pembayaran
     */
    public function callback(Request $request)
    {
        // Ambil data dari callback Midtrans
        $data = $request->all();

        // Log data callback untuk debugging
        Log::info('Midtrans Callback: ', $data);

        // Update status pembayaran di tabel booking
        if (isset($data['transaction_status']) && isset($data['order_id'])) {
            $bookingId = str_replace('ORDER-', '', $data['order_id']);
            $booking = Booking::find($bookingId);

            if ($booking) {
                if ($data['transaction_status'] == 'settlement') {
                    $booking->status = 'Paid';
                } elseif (in_array($data['transaction_status'], ['cancel', 'deny', 'expire'])) {
                    $booking->status = 'Failed';
                } else {
                    $booking->status = 'Pending';
                }

                $booking->save();
            }
        }

        return response()->json(['message' => 'Callback processed successfully']);
    }

    public function handleNotification(Request $request)
    {
        // Ambil data dari Midtrans
        $notif = $request->all();
        $orderId = $notif['order_id'];
        $transactionStatus = $notif['transaction_status'];
        $fraudStatus = $notif['fraud_status'];

        // Cari booking berdasarkan order_id
        $booking = Booking::where('order_id', $orderId)->first();

        if (!$booking) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status berdasarkan notifikasi
        if ($transactionStatus == 'settlement' && $fraudStatus == 'accept') {
            $booking->status = 'Completed'; // Ubah jadi Completed
        } elseif ($transactionStatus == 'pending') {
            $booking->status = 'Pending';
        } elseif ($transactionStatus == 'expire' || $transactionStatus == 'cancel') {
            $booking->status = 'Failed';
        }

        $booking->save();

        return response()->json(['message' => 'Notification handled'], 200);
    }

}
