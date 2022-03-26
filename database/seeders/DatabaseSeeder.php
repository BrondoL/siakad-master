<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan seed
     */
    public function run()
    {
        $this->call([
            PtSeeder::class, // dummy
            JenjangPendidikanSeeder::class, // dummy
            UnitSeeder::class, // dummy
            AgamaSeeder::class,
            AlmamaterSeeder::class,
            StatusMahasiswaSeeder::class
        ]);
    }
}
