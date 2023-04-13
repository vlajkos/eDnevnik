<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ocena;

class OcenaSeeder extends Seeder
{
    public function factory($vrednost, $opis, $id_predmet, $id_ucenik, $id_profesor)
    {
        return
            Ocena::create([
                "vrednost" => $vrednost,
                "opis" => $opis,
                "id_predmet" => $id_predmet,
                "id_ucenik" => $id_ucenik,
                "id_profesor" => $id_profesor,
            ]);
    }
    public function run(): void
    {
        $ocena = $this->factory(5, "opis", 1, 1, 1);
        $ocena = $this->factory(4, "opis", 1, 1, 1);
        $ocena = $this->factory(4, "opis", 1, 1, 1);
        $ocena = $this->factory(5, "opis", 1, 1, 1);

        $ocena = $this->factory(4, "opis", 2, 1, 2);
        $ocena = $this->factory(4, "opis", 2, 1, 2);
        $ocena = $this->factory(4, "opis", 2, 1, 2);
        $ocena = $this->factory(5, "opis", 2, 1, 2);

        $ocena = $this->factory(4, "opis", 3, 1, 3);
        $ocena = $this->factory(4, "opis", 3, 1, 3);
        $ocena = $this->factory(4, "opis", 3, 1, 3);
        $ocena = $this->factory(5, "opis", 3, 1, 3);

        $ocena = $this->factory(3, "opis", 4, 1, 4);
        $ocena = $this->factory(3, "opis", 4, 1, 4);
        $ocena = $this->factory(4, "opis", 4, 1, 4);

        $ocena = $this->factory(3, "opis", 1, 2, 1);
        $ocena = $this->factory(4, "opis", 1, 2, 1);
        $ocena = $this->factory(3, "opis", 1, 2, 1);
        $ocena = $this->factory(5, "opis", 1, 2, 1);
    }
}
