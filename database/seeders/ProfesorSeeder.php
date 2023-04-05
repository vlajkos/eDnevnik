<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    public function factory($ime, $prezime, $email, $password, $is_razredni)
    {
        return
            Profesor::create([
                "ime" => $ime,
                "prezime" => $prezime,
                "email" => $email,
                "password" => Hash::make($password),
                "is_razredni" => $is_razredni,

            ]);
    }
    public function run(): void
    {
        $profesor = $this->factory("Mirjana", "Bradić", "mirjana@gmail.com", "mirjanabradic", true);
        $profesor = $this->factory("Nataša", "Kostić", "Natasa77@gmail.com", "natasa77", true);
        $profesor = $this->factory("Zarko", "Životić", "zarkoz@gmail.com", "zarkoz123", true);
        $profesor = $this->factory("Milan", "Janković", "milanj88@gmail.com", "milanj88", true);

        $profesor = $this->factory("Milan", "Markovic", "milan@gmail.com", "lozinkaprofesor", false);
        $profesor = $this->factory("ana", "Markovic", "ana88@gmail.com", "lozinkaprofesor", false);
        $profesor = $this->factory("milica", "Markovic", "milica@gmail.com", "lozinkaprofesor", false);
        $profesor = $this->factory("Jovana", "Markovic", "jovana@gmail.com", "lozinkaprofesor", false);
        $profesor = $this->factory("aleksandar", "Markovic", "aleksandar@gmail.com", "lozinkaprofesor", false);
    }
}
