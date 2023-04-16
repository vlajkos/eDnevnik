<?php

namespace App\Http\Controllers;

use App\Models\Odeljenje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SortService;
use App\Services\RedirectService;

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
        $redirectService = new RedirectService;

        $profesor = Auth::user();
        if ($profesor->is_razredni) {
            $odeljenje = $profesor->odeljenje;
            $ucenici = $odeljenje->ucenici;
            $sortService = new SortService;
            $ucenici = $sortService->sort($ucenici);
            return view('odeljenje')->with(['odeljenje' => $odeljenje, 'ucenici' => $ucenici, 'profesor' => $profesor]);
        }
        return $redirectService->redirectProfesor($profesor);
    }

    public function show(Request $request, Odeljenje $odeljenje)
    {
        $profesor = Auth::user();
        $profesori = $odeljenje->profesori;
        $ucenici = $odeljenje->ucenici;
        $ucenici = $odeljenje->ucenici;
        foreach ($profesori as $prof) {
            if ($prof->id === $profesor->id) {
                $sortService = new SortService;
                $ucenici = $sortService->sort($ucenici);
                return view('ucenici')->with(['ucenici' => $ucenici, 'odeljenje' => $odeljenje]);
            }
        }
        $service = new RedirectService;
        return  $service->redirectProfesor($profesor);
    }

    public function showProfesor(Request $request, Odeljenje $odeljenje)
    {
        $ucenici = $odeljenje->ucenici;
        return view('ucenici')->with(['ucenici' => $ucenici]);
    }
}
