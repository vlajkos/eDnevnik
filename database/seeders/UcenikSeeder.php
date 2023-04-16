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
        $ucenik = $this->factory("ana", "anić", "anaucenik@gmail.com", "5234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("jovana", "pavlović", "jovanaucenik@gmail.com", "4234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("aleksa", "tomović", "aleksaucenik@gmail.com", "3234567891234", "sifraucenik", 1);

        $ucenik = $this->factory("Nemanja", "đedović", "nemanjaucenik@gmail.com", "2234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("ana", "ignjatović", "anaignjatovic@gmail.com", "1234567891244", "sifraucenik", 1);
        $ucenik = $this->factory("isidora", "jeremić", "isidoraucenik@gmail.com", "1234567891234", "sifraucenik", 1);
        $ucenik = $this->factory("andrija", "ilić", "andrijaucenik@gmail.com", "1234567891234", "sifraucenik", 1);

        $ucenik = $this->factory("Marija", "živić", "marijaucenik@gmail.com", "234567891234", "sifraucenik", 2);
        $ucenik = $this->factory("jovana", "spasić", "jovanaspasic@gmail.com", "29234567891244", "sifraucenik", 2);
        $ucenik = $this->factory("ana", "lazić", "analazic@gmail.com", "9934567891234", "sifraucenik", 2);
        $ucenik = $this->factory("Mladen", "Jovanović", "mladenjovanovic@gmail.com", "0234567891234", "sifraucenik", 2);


        $ucenik = $this->factory("Anđela", "kostić", "andjelakostic@gmail.com", "234567891234", "sifraucenik", 3);
        $ucenik = $this->factory("nemanja", "spasić", "nemanjaspasic@gmail.com", "29234567891244", "sifraucenik", 3);
        $ucenik = $this->factory("jovan", "lazić", "jovanlazic@gmail.com", "9934567891234", "sifraucenik", 3);
        $ucenik = $this->factory("miloš", "trninić", "milostrninic@gmail.com", "0234567891234", "sifraucenik", 3);


        $ucenik = $this->factory("Jovan", "Jovanović", "jovanjovanovic@gmail.com", "234567891234", "sifraucenik", 4);
        $ucenik = $this->factory("Aleksa", "Ćuk", "aleksacuk@gmail.com", "29234567891244", "sifraucenik", 4);
        $ucenik = $this->factory("Milovan", "lazić", "milovanlazic@gmail.com", "0334567891234", "sifraucenik", 4);
        $ucenik = $this->factory("milica", "janićijević", "milicajanicijevic@gmail.com", "0234567891234", "sifraucenik", 4);
    }
}
