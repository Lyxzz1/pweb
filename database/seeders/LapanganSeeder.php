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
                'nama' => 'Lapangan Futsal A',
                'deskripsi' => 'Lapangan futsal indoor dengan rumput sintetis berkualitas tinggi',
                'harga' => 100000,
                'gambar' => 'futsal-a.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Futsal B',
                'deskripsi' => 'Lapangan futsal outdoor dengan lantai vinyl profesional',
                'harga' => 120000,
                'gambar' => 'futsal-b.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Basket A',
                'deskripsi' => 'Lapangan basket indoor dengan lantai kayu maple',
                'harga' => 150000,
                'gambar' => 'basket-a.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Basket B',
                'deskripsi' => 'Lapangan basket outdoor dengan lantai rubber',
                'harga' => 130000,
                'gambar' => 'basket-b.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Badminton A',
                'deskripsi' => 'Lapangan badminton indoor dengan lantai vinyl khusus',
                'harga' => 80000,
                'gambar' => 'badminton-a.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Badminton B',
                'deskripsi' => 'Lapangan badminton indoor dengan pencahayaan standar turnamen',
                'harga' => 85000,
                'gambar' => 'badminton-b.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Voli A',
                'deskripsi' => 'Lapangan voli indoor dengan lantai taraflex',
                'harga' => 110000,
                'gambar' => 'voli-a.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Voli B',
                'deskripsi' => 'Lapangan voli outdoor dengan pasir pantai',
                'harga' => 90000,
                'gambar' => 'voli-b.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Tennis A',
                'deskripsi' => 'Lapangan tennis outdoor dengan hard court',
                'harga' => 200000,
                'gambar' => 'tennis-a.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Tennis B',
                'deskripsi' => 'Lapangan tennis indoor dengan lantai synthetic',
                'harga' => 180000,
                'gambar' => 'tennis-b.jpg',
                'status' => true,
            ],
        ];

        foreach ($lapangan as $lap) {
            Lapangan::create($lap);
        }
    }
}
