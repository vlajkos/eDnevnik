<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\predmet;

class PredmetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function factory($ime_predmeta)
    {
        return
            Predmet::create([
                "ime_predmeta" => $ime_predmeta,
            ]);
    }
    public function run(): void
    {
        $predmet = $this->factory("Matematika");
        $predmet = $this->factory("Srpski jezik");
        $predmet = $this->factory("Geografija");
        $predmet = $this->factory("Istorija");
        $predmet = $this->factory("Engleski jezik");
        $predmet = $this->factory("Fizičko vaspitanje");
    }
}
