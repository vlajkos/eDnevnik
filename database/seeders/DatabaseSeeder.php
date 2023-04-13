<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Models\Odeljenje_predmet;
use App\Models\Odeljenje_profesor;
use Illuminate\Support\Facades\Hash;

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
            OcenaSeeder::class

        ]);


        Odeljenje_predmet::create([
            "id_odeljenje" => 1,
            "id_predmet" => 1
        ]);
        Odeljenje_predmet::create([
            "id_odeljenje" => 1,
            "id_predmet" => 2
        ]);
        Odeljenje_predmet::create([
            "id_odeljenje" => 1,
            "id_predmet" => 3
        ]);
        Odeljenje_predmet::create([
            "id_odeljenje" => 1,
            "id_predmet" => 4
        ]);
        Odeljenje_profesor::create([
            "id_odeljenje" => 1,
            "id_profesor" => 1
        ]);
        Odeljenje_profesor::create([
            "id_odeljenje" => 1,
            "id_profesor" => 2
        ]);
        Odeljenje_profesor::create([
            "id_odeljenje" => 1,
            "id_profesor" => 3
        ]);
        Odeljenje_profesor::create([
            "id_odeljenje" => 1,
            "id_profesor" => 4
        ]);
    }
}
