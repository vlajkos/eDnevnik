<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OcenaStoreRequest;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Predmet;

class OcenaController extends Controller
{
    public function store(OcenaStoreRequest $request, Ucenik $ucenik)
    {
        $profesor = $request->user();
        $ocena =  new Ocena;
        $ocena->vrednost = $request->vrednost;
        $ocena->opis = $request->opis;
        $ocena->id_predmet = $profesor->predmet->id;
        $ocena->id_profesor = $profesor->id;
        $ocena->id_ucenik = $ucenik->id;
        $ocena->save();
    }


    public function show(Request $request, Ocena $ocena)
    {
        return view('Ocene')->with(['ocena' => $ocena]);
    }
}
