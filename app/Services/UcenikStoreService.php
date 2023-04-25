<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Ocena;
use Illuminate\Support\Facades\Hash;


class UcenikStoreService
{

    public function store($request, $razredni, $ucenik)
    {
        $ucenik->ime = $request->input('ime');
        $ucenik->prezime = $request->input('prezime');
        $ucenik->email = $request->input('email');
        $ucenik->password = Hash::make($request->input('password'));
        $ucenik->jmbg = $request->input('jmbg');
        $ucenik->datum_rodjenja = $request->input('datum_rodjenja');
        $ucenik->broj_telefona = $request->input('broj_telefona');
        $ucenik->id_odeljenje = $razredni->odeljenje->id;
        $ucenik->save();
        return $ucenik;
    }
}
