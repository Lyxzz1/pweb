<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $pelanggans = [
            [
                'name' => 'Divo',
                'email' => 'divo@gmail.com',
                'password' => Hash::make('divo123'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diva',
                'email' => 'diva@gmail.com',
                'password' => Hash::make('diva123'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Wilson',
                'email' => 'bob@gmail.com',
                'password' => Hash::make('bob123'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($pelanggans as $pelanggan) {
            User::create($pelanggan);
        }
    }
} 