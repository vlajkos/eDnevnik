<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            PredmetSeeder::class,
            ProfesorSeeder::class,
            OdeljenjeSeeder::class,
            UcenikSeeder::class,
            OcenaSeeder::class,
            PredmetProfesorSeeder::class

        ]);
    }
}
