<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $table->string("ime");
        // $table->string("prezime");
        // $table->string("email");
        // $table->string("password");
        Profesor::create([
            "ime" => "Nataša",
            "prezime" => "Kostić",
            "email" => "natasakostic77@gmail.com",
            "password" => Hash::make("natasa77"),
            "is_razredni" => false,

        ]);
        Odeljenje::create([
            "naziv" => "1/4",
            "id_profesor" => 1
        ]);
        Ucenik::create([
            "ime" => "Vladimir",
            "prezime" => "Stanišić",
            "email" => "Vlajko1453@gmail.com",
            "password" => Hash::make("natasa77"),
            "jmbg" => "2906999720052",
            "broj_telefona" => "0642949185",
            "datum_rodjenja" => "1999-06-29",
            "id_odeljenje" => 1


        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
