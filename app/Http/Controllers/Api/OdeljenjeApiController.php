<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Odeljenje;
use App\Services\SortService;

class OdeljenjeApiController extends Controller
{
    public function index(Request $request)
    {
        $profesor = $request->user();
        $odeljenja = $profesor->odeljenja;
        $jsonData = [];

        foreach ($odeljenja as $odeljenje) {
            $razredni = $odeljenje->razredni;
            $jsonData[] = ["odeljenje" => $odeljenje];
        }
        return response()->json(["odeljenja" => $jsonData]);
    }


    public function show(Request $request, Odeljenje $odeljenje)
    {

        $profesor = $request->user();
        $profesori = $odeljenje->profesori;
        $ucenici = $odeljenje->ucenici;
        $sortService = new SortService;
        foreach ($profesori as $prof) {
            if ($prof->id === $profesor->id) {
                $ucenici = $sortService->sort($ucenici);
                $razredni = $odeljenje->razredni;
                return response()->json(["odeljenje" => $odeljenje->naziv, "razredni" => $razredni, "ucenici" => $ucenici]);
            }
        }
        return response()->json(["success" => false, "poruka" => "Nije vam dozvoljen pristup ovom odeljenju"]);
    }
}
