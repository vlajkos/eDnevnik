<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Odeljenje_predmet;
use App\Models\Odeljenje_profesor;

class PredmetProfesorSeeder extends Seeder
{
    public function factoryPredmet($id_odeljenje, $id_predmet)
    {
        return
            Odeljenje_predmet::create([
                "id_odeljenje" => $id_odeljenje,
                "id_predmet" => $id_predmet
            ]);
    }
    public function factoryProfesor($id_odeljenje, $id_profesor)
    {
        return
            Odeljenje_profesor::create([
                "id_odeljenje" => $id_odeljenje,
                "id_profesor" => $id_profesor
            ]);
    }
    public function run(): void
    {
        $predmet = $this->factoryPredmet(1, 1);
        $predmet = $this->factoryPredmet(1, 2);
        $predmet = $this->factoryPredmet(1, 3);
        $predmet = $this->factoryPredmet(1, 4);
        $predmet = $this->factoryPredmet(1, 5);

        $profesor = $this->factoryProfesor(1, 1);
        $profesor = $this->factoryProfesor(1, 2);
        $profesor = $this->factoryProfesor(1, 3);
        $profesor = $this->factoryProfesor(1, 4);
        $profesor = $this->factoryProfesor(1, 11);


        $predmet = $this->factoryPredmet(2, 1);
        $predmet = $this->factoryPredmet(2, 2);
        $predmet = $this->factoryPredmet(2, 3);
        $predmet = $this->factoryPredmet(2, 6);
        $predmet = $this->factoryPredmet(2, 5);

        $profesor = $this->factoryProfesor(2, 5);
        $profesor = $this->factoryProfesor(2, 7);
        $profesor = $this->factoryProfesor(2, 8);
        $profesor = $this->factoryProfesor(2, 13);
        $profesor = $this->factoryProfesor(2, 10);


        $predmet = $this->factoryPredmet(3, 1);
        $predmet = $this->factoryPredmet(3, 2);
        $predmet = $this->factoryPredmet(3, 3);
        $predmet = $this->factoryPredmet(3, 4);
        $predmet = $this->factoryPredmet(3, 5);

        $profesor = $this->factoryProfesor(3, 1);
        $profesor = $this->factoryProfesor(3, 2);
        $profesor = $this->factoryProfesor(3, 3);
        $profesor = $this->factoryProfesor(3, 4);
        $profesor = $this->factoryProfesor(3, 11);


        $predmet = $this->factoryPredmet(4, 1);
        $predmet = $this->factoryPredmet(4, 2);
        $predmet = $this->factoryPredmet(4, 3);
        $predmet = $this->factoryPredmet(4, 4);
        $predmet = $this->factoryPredmet(4, 6);

        $profesor = $this->factoryProfesor(4, 1);
        $profesor = $this->factoryProfesor(4, 2);
        $profesor = $this->factoryProfesor(4, 3);
        $profesor = $this->factoryProfesor(4, 4);
        $profesor = $this->factoryProfesor(4, 13);
    }
}


// Odeljenje_predmet::create([
//     "id_odeljenje" => 1,
//     "id_predmet" => 1
// ]);
// Odeljenje_predmet::create([
//     "id_odeljenje" => 1,
//     "id_predmet" => 2
// ]);
// Odeljenje_predmet::create([
//     "id_odeljenje" => 1,
//     "id_predmet" => 3
// ]);
// Odeljenje_predmet::create([
//     "id_odeljenje" => 1,
//     "id_predmet" => 4
// ]);
// Odeljenje_profesor::create([
//     "id_odeljenje" => 1,
//     "id_profesor" => 1
// ]);
// Odeljenje_profesor::create([
//     "id_odeljenje" => 1,
//     "id_profesor" => 2
// ]);
// Odeljenje_profesor::create([
//     "id_odeljenje" => 1,
//     "id_profesor" => 3
// ]);
// Odeljenje_profesor::create([
//     "id_odeljenje" => 1,
//     "id_profesor" => 4
// ]);