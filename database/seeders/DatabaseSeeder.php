<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Az alkalmazás adatbázisának feltöltése.
     */
    public function run(): void
    {
        $this->call([
            CountySeeder::class,
            CitySeeder::class,
        ]);
    }
}
