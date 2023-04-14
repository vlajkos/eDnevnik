<?php

namespace App\Http\Controllers;

use App\Models\Odeljenje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SortService;

class OdeljenjeController extends Controller
{
    //Prikazuje sva odeljenja koja pripadaju jednom profesoru
    public function index(Request $request)
    {
        $profesor = Auth::user();
        $odeljenja = $profesor->odeljenja;
        return view('odeljenja')->with(['odeljenja' => $odeljenja]);
    }
    public function indexOdeljenje(Request $request)
    {

        $profesor = Auth::user();
        if ($profesor->is_razredni) {
            $odeljenje = $profesor->odeljenje;
            $ucenici = $odeljenje->ucenici;
            $sortService = new SortService;
            $ucenici = $sortService->sort($ucenici);
        } else {
            $odeljenje = [];
            $ucenici = [];
        }

        return view('odeljenje')->with(['odeljenje' => $odeljenje, 'ucenici' => $ucenici, 'profesor' => $profesor]);
    }
    public function show(Request $request, Odeljenje $odeljenje)
    {
        $ucenici = $odeljenje->ucenici;
        $ucenici = $odeljenje->ucenici;
        $sortService = new SortService;
        $ucenici = $sortService->sort($ucenici);
        return view('ucenici')->with(['ucenici' => $ucenici, 'odeljenje' => $odeljenje]);
    }
    public function showProfesor(Request $request, Odeljenje $odeljenje)
    {
        $ucenici = $odeljenje->ucenici;
        return view('ucenici')->with(['ucenici' => $ucenici]);
    }
}
