<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use Illuminate\Database\Seeder;

class LapanganSeeder extends Seeder
{
    public function run()
    {
        $lapangan = [
            [
                'nama' => 'Lapangan Futsal Elphasindo',
                'deskripsi' => 'Lapangan futsal indoor dengan rumput sintetis berkualitas tinggi',
                'harga' => 100000,
                'gambar' => 'images/lapangan/futsal a.jpeg',
                // asset('storage/images/lapangan/futsal a.jpeg'
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Futsal Zona',
                'deskripsi' => 'Lapangan futsal outdoor dengan lantai vinyl profesional',
                'harga' => 120000,
                'gambar' => 'images/lapangan/futsal b.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Basket Garuda',
                'deskripsi' => 'Lapangan basket indoor dengan lantai kayu maple',
                'harga' => 150000,
                'gambar' => 'images/lapangan/basket a.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Basket PKPSO',
                'deskripsi' => 'Lapangan basket outdoor dengan lantai rubber',
                'harga' => 130000,
                'gambar' => 'images/lapangan/basket b.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Badminton United',
                'deskripsi' => 'Lapangan badminton indoor dengan lantai vinyl khusus',
                'harga' => 80000,
                'gambar' => 'images/lapangan/badminton a.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Badminton Rust',
                'deskripsi' => 'Lapangan badminton indoor dengan pencahayaan standar turnamen',
                'harga' => 85000,
                'gambar' => 'images/lapangan/badminton b.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Voli Blade',
                'deskripsi' => 'Lapangan voli indoor dengan lantai taraflex',
                'harga' => 110000,
                'gambar' => 'images/lapangan/voly a.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Voli Papuma',
                'deskripsi' => 'Lapangan voli outdoor dengan pasir pantai',
                'harga' => 90000,
                'gambar' => 'images/lapangan/voly b.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Tennis Gor',
                'deskripsi' => 'Lapangan tennis outdoor dengan hard court',
                'harga' => 200000,
                'gambar' => 'images/lapangan/tennis a.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Tennis Excelso',
                'deskripsi' => 'Lapangan tennis indoor dengan lantai synthetic',
                'harga' => 180000,
                'gambar' => 'images/lapangan/tennis b.jpeg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Billiard Bourju',
                'deskripsi' => 'Lapangan billiard yang modern dan keren',
                'harga' => 50000,
                'gambar' => 'images/lapangan/billiard a.jpeg',
                'status' => true,
            ],
        ];

        foreach ($lapangan as $lap) {
            Lapangan::create($lap);
        }
    }
}
