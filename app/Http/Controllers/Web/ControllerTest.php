<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RedirectService;

class ControllerTest extends Controller
{
    public function index(Request $request)
    {
        $profesor = $request->user();
        $redirectService = new RedirectService;
        return $redirectService->redirectProfesor($profesor);
    }
    public function indexUcenik(Request $request)
    {
        $ucenik = Auth::user();

        $predmeti = $ucenik->odeljenje->predmeti;
        $odeljenje = $ucenik->odeljenje;
        $ocene = $ucenik->ocene;
        return view('index-ucenik')->with([
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

    public function home(Request $request)
    {
        $profesor = $request->user();
        $redirectService = new RedirectService;
        if (Auth::guard('admin')->check()) {
            return $redirectService->redirectProfesor($profesor);
        } elseif (Auth::guard('web')->check()) {
            return redirect("index-ucenik");
        } else {
            return redirect("login");
        }
    }
}
