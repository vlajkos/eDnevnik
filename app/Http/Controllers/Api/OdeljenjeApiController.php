<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Odeljenje;
use App\Services\SortService;
use App\Services\ResponseService;

class OdeljenjeApiController extends Controller
{
    public function index(Request $request)
    {
        $profesor = $request->user();
        $odeljenja = $profesor->odeljenja;
        $jsonData = [];
        $responseService = new ResponseService;

        foreach ($odeljenja as $odeljenje) {
            $jsonData[] = ["odeljenje" => $odeljenje];
        }
        $data = $jsonData;
        return $responseService->response(true, 200, "success", $data);
    }


    public function show(Request $request, Odeljenje $odeljenje)
    {

        $responseService = new ResponseService;
        $profesor = $request->user();
        $profesori = $odeljenje->profesori;
        $ucenici = $odeljenje->ucenici;
        $sortService = new SortService;
        foreach ($profesori as $prof) {
            if ($prof->id === $profesor->id) {
                $ucenici = $sortService->sort($ucenici);
                $razredni = $odeljenje->razredni;
                $data = ["odeljenje" => $odeljenje->naziv, "razredni" => $razredni, "ucenici" => $ucenici];
                return $responseService->response(true, 200, "success", $data);
            }
        }
        return $responseService->response(false, 403, "Nije vam dozvoljen pristup ovom odeljenju");
    }


    public function showRazredni(Request $request)
    {

        $razredni = $request->user();
        $odeljenje = $razredni->odeljenje;
        $ucenici = $odeljenje->ucenici;
        $sortService = new SortService;
        $responseService = new ResponseService;
        if ($razredni->is_razredni) {
            $ucenici = $sortService->sort($ucenici);
            $razredni = $odeljenje->razredni;
            $data = ["odeljenje" => $odeljenje->naziv, "razredni" => $razredni, "ucenici" => $ucenici];
            return $responseService->response(true, 200, "success", $data);
        }

        return $responseService->response(false, 403, "Niste razredni starešina");
    }
}
