<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ucenik;
use Illuminate\Support\Facades\Hash;

class UcenikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function factory($ime, $prezime, $email, $jmbg, $password, $id_odeljenje)
    {
        return
            Ucenik::create([
                "ime" => $ime,
                "prezime" => $prezime,
                "email" => $email,
                "jmbg" => $jmbg,
                "password" => Hash::make($password),
                "id_odeljenje" => $id_odeljenje



            ]);
    }
    public function run(): void
    {
        $ucenik = $this->factory("vladimir", "stanišić", "vladimirucenik@gmail.com", "1234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("ana", "anić", "anaucenik@gmail.com", "1234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("jovana", "pavlović", "jovanaucenik@gmail.com", "1234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("aleksa", "tomović", "aleksaucenik@gmail.com", "1234567891234", "sifraucenik", 1);
    }
}
