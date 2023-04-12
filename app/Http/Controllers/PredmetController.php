<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predmet;
use App\Models\Profesor;
use App\Models\Odeljenje_predmet;
use App\Models\Odeljenje_profesor;
use App\Http\Requests\PredmetProfesorStoreRequest;
use Illuminate\Support\Facades\Auth;

class PredmetController extends Controller
{
    public function show(Request $request)
    {
        $predmeti = Predmet::all();
        $profesori = Profesor::all();
        $odeljenje  = Auth::user()->odeljenje;
        return  view('dodajPredmet')->with(['predmeti' => $predmeti, 'profesori' => $profesori, 'odeljenje' => $odeljenje]);
    }

    public function store(PredmetProfesorStoreRequest $request)
    {


        $odeljenje_predmet = new Odeljenje_predmet;
        $odeljenje_predmet->id_predmet = $request->id_predmet;
        $odeljenje_predmet->id_odeljenje = $request->id_odeljenje;
        $odeljenje_predmet->save();

        $odeljenje_profesor = new Odeljenje_profesor;
        $odeljenje_profesor->id_profesor = $request->id_profesor;
        $odeljenje_profesor->id_odeljenje = $request->id_odeljenje;
        $odeljenje_profesor->save();

        return redirect()->route('index');
    }
}
