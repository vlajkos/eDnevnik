<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
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
        // $table->string("lozinka");
        Profesor::create([
            "ime" => "Nataša",
            "prezime" => "Kostić",
            "email" => "natasakostic77@gmail.com",
            "lozinka" => Hash::make("natasa77"),
            "is_razredni" => false,

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
