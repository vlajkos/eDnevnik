<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Odeljenje;

class OdeljenjeSeeder extends Seeder
{
    public function factory($naziv, $id)
    {
        return
            Odeljenje::create([
                "naziv" => $naziv,
                "id_profesor" => $id
            ]);
    }
    public function run(): void
    {
        $odeljenje = $this->factory("1/2", 2);
        $odeljenje = $this->factory("2/4", 3);
        $odeljenje = $this->factory("1/1", 4);
        $odeljenje = $this->factory("2/3", 5);
    }
}
