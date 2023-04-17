<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Ocena;


class OcenaStoreService
{

    public function store($request, $profesor, $ucenik)
    {
        $ocena = new Ocena;
        $ocena->vrednost = $request->vrednost;
        $ocena->opis = $request->opis;
        $ocena->id_predmet = $profesor->predmet->id;
        $ocena->id_profesor = $profesor->id;
        $ocena->id_ucenik = $ucenik->id;
        $ocena->save();
        return $ocena;
    }
}
