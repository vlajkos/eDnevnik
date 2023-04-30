<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Odeljenje_predmet;
use App\Models\Odeljenje_profesor;

class PredmetProfesorStoreService
{

    public function store($request, $id_odeljenje)
    {
        $odeljenje_predmet = new Odeljenje_predmet;
        $odeljenje_predmet->id_predmet = $request->id_predmet;
        $odeljenje_predmet->id_odeljenje = $id_odeljenje;
        $odeljenje_predmet->save();

        $odeljenje_profesor = new Odeljenje_profesor;
        $odeljenje_profesor->id_profesor = $request->id_profesor;
        $odeljenje_profesor->id_odeljenje = $id_odeljenje;
        $odeljenje_profesor->save();
    }
}
