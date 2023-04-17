<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OcenaStoreRequest;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Services\OcenaStoreService;

class OcenaController extends Controller
{
    public function store(OcenaStoreRequest $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        // $profesor = Auth::user();
        $profesor = $request->user();
        $storeService = new OcenaStoreService;
        $storeService->store($request, $profesor, $ucenik);
        return redirect()->route('ucenik.show.profesor', [$odeljenje, $ucenik]);
    }


    public function show(Request $request, Ucenik $ucenik, Ocena $ocena)
    {
        return view('ocena')->with(['ocena' => $ocena]);
    }
    public function showProfesor(Request $request, Odeljenje $odeljenje, Ucenik $ucenik, Ocena $ocena)
    {
        return view('ocena')->with(['ocena' => $ocena]);
    }
}
