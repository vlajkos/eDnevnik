<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerTest extends Controller
{
    public function index(Request $request)
    {
        $profesor = $request->user();


        return view("index")->with(["loggedUser" => $profesor]);;
    }
    public function indexUcenik(Request $request)
    {
        $ucenik = Auth::user();

        $predmeti = $ucenik->odeljenje->predmeti;
        $odeljenje = $ucenik->odeljenje;
        $ocene = $ucenik->ocene;
        return view('indexUcenik')->with([
            'ucenik' => $ucenik,
            'predmeti' => $predmeti,
            'ocene' => $ocene,
            'odeljenje' => $odeljenje
        ]);
    }
    public function index2()
    {

        return view("auth/login");
    }
}
