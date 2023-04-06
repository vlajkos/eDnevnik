<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeljenje;

class OdeljenjeController extends Controller
{

    //Prikazuje sva odeljenja koja pripadaju jednom profesoru
    public function index(Request $request)
    {
        $profesor = $request->user();
        $odeljenja = $profesor->odeljenja();
        return view('odeljenja')->with($odeljenja);
    }
    public function show(Request $request, Odeljenje $odeljenje)
    {
        $ucenici = $odeljenje->ucenici();
        return view('ucenici')->with($ucenici);
    }
}
