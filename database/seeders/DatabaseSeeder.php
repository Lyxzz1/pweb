<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            LapanganSeeder::class,
            BookingSeeder::class,
            PelangganSeeder::class,
        ]);
    }
}
