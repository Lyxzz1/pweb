<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $bookings = [
            [
                'user_id' => 1,
                'lapangan_id' => 1,
                'tanggal' => now()->addDays(1),
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'total_harga' => 200000, // 2 jam x 100.000
                'status' => 'confirmed',
                'catatan' => 'Booking lapangan futsal untuk latihan tim',
            ],
            [
                'user_id' => 1,
                'lapangan_id' => 3,
                'tanggal' => now()->addDays(2),
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '16:00:00',
                'total_harga' => 300000, // 2 jam x 150.000
                'status' => 'pending',
                'catatan' => 'Booking lapangan basket untuk pertandingan persahabatan',
            ],
            [
                'user_id' => 1,
                'lapangan_id' => 5,
                'tanggal' => now()->addDays(3),
                'jam_mulai' => '19:00:00',
                'jam_selesai' => '21:00:00',
                'total_harga' => 160000, // 2 jam x 80.000
                'status' => 'confirmed',
                'catatan' => 'Booking lapangan badminton untuk latihan rutin',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
} 