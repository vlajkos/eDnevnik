<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    public function factory($ime, $prezime, $email, $password, $is_razredni, $id_predmet)
    {
        return
            Profesor::create([
                "ime" => $ime,
                "prezime" => $prezime,
                "email" => $email,
                "password" => Hash::make($password),
                "is_razredni" => $is_razredni,
                "id_predmet" => $id_predmet


            ]);
    }
    public function run(): void
    {
        $profesor = $this->factory("Mirjana", "Bradić", "mirjana@gmail.com", "mirjanabradic", true, 1);
        $profesor = $this->factory("Nataša", "Kostić", "Natasa77@gmail.com", "natasa77", true, 2);
        $profesor = $this->factory("Zarko", "Životić", "zarkoz@gmail.com", "zarkoz123", true, 3);
        $profesor = $this->factory("Milan", "Janković", "milanj88@gmail.com", "milanj88", true, 4);

        $profesor = $this->factory("Milan", "Markovic", "milan@gmail.com", "sifraprofesor", false, 1);
        $profesor = $this->factory("ana", "Teofilović", "ana88@gmail.com", "sifraprofesor", false, 1);
        $profesor = $this->factory("milica", "Macura", "milica@gmail.com", "sifraprofesor", false, 2);

        $profesor = $this->factory("Maša", "Duvnjak", "masaduvnjak@gmail.com", "sifraprofesor", false, 3);
        $profesor = $this->factory("Jovana", "Joksimović", "jovana@gmail.com", "sifraprofesor", false, 3);
        $profesor = $this->factory("aleksandar", "Markovic", "aleksandar@gmail.com", "sifraprofesor", false, 1);
        $profesor = $this->factory("Jerotije", "Milić", "jerotije@gmail.com", "sifraprofesor", false, 5);
        $profesor = $this->factory("Miroslav", "anić", "miroslav@gmail.com", "sifraprofesor", false, 5);

        $profesor = $this->factory("Andrija", "Simić", "andrija@gmail.com", "sifraprofesor", false, 6);
        $profesor = $this->factory("Filip", "Filipović", "filip@gmail.com", "sifraprofesor", false, 6);
    }
}
