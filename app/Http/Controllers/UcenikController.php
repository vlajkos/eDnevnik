<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ucenik;
use App\Models\Profesor;
use App\Models\Odeljenje;
use App\Models\Predmet;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UcenikStoreRequest;



class UcenikController extends Controller
{

    public function index(Request $request)
    {
        $idOdeljenje = $request->user()->odeljenje->id;
        $ucenici = Ucenik::all()->where('id_odeljenje', '=', $idOdeljenje);
        return view("ucenici")->with([
            'ucenici' => $ucenici
        ]);
    }

    public function create()
    {
        return view('dodaj');
    }
    public function show(Request $request, Ucenik $ucenik)
    {
        $predmeti = $ucenik->odeljenje->predmeti;
        $odeljenje = $ucenik->odeljenje;
        $ocene = $ucenik->ocene;
        return view('ucenik')->with([
            'ucenik' => $ucenik,
            'predmeti' => $predmeti,
            'ocene' => $ocene,
            'odeljenje' => $odeljenje
        ]);
    }
    public function showProfesor(Request $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        $profesor = $request->user();
        $predmet = $profesor->predmet;
        $odeljenje = $ucenik->odeljenje;
        $ocene = $ucenik->ocene;
        return view('ucenikProfesor')->with([
            'ucenik' => $ucenik,
            'ocene' => $ocene,
            'odeljenje' => $odeljenje,
            'predmet' => $predmet
        ]);
    }

    public function store(UcenikStoreRequest $request)
    {
        $razredni = $request->user();
        $ucenik = new Ucenik;
        $ucenik->ime = $request->input('ime');
        $ucenik->prezime = $request->input('prezime');
        $ucenik->email = $request->input('email');
        $ucenik->password = Hash::make($request->input('password'));
        $ucenik->jmbg = $request->input('jmbg');
        $ucenik->datum_rodjenja = $request->input('datum_rodjenja');
        $ucenik->broj_telefona = $request->input('broj_telefona');
        $ucenik->id_odeljenje = $razredni->odeljenje->id;
        $ucenik->save();
        return redirect()->route('index');
    }
}
