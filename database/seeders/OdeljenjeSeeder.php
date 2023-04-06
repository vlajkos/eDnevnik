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
                "id_razredni" => $id
            ]);
    }
    public function run(): void
    {
        $odeljenje = $this->factory("1/2", 1);
        $odeljenje = $this->factory("2/4", 2);
        $odeljenje = $this->factory("1/1", 3);
        $odeljenje = $this->factory("2/3", 4);
    }
}
