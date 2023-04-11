<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OcenaStoreRequest;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use Illuminate\Support\Facades\Auth;

class OcenaController extends Controller
{
    public function store(OcenaStoreRequest $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        // $profesor = Auth::user();
        $profesor = $request->user();
        $ocena =  new Ocena;
        $ocena->vrednost = $request->input('vrednost');
        $ocena->opis = $request->input('opis');
        $ocena->id_predmet = $profesor->predmet->id;
        $ocena->id_profesor = $profesor->id;
        $ocena->id_ucenik = $ucenik->id;
        $ocena->save();
        return redirect()->route('ucenik.show.profesor', [$odeljenje, $ucenik]);
    }


    public function show(Request $request, Ocena $ocena)
    {
        return view('Ocene')->with(['ocena' => $ocena]);
    }
}