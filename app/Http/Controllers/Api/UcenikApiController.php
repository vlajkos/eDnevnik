<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UcenikStoreRequest;
use Illuminate\Http\Request;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Services\UcenikStoreService;
use App\Services\ResponseService;



class UcenikApiController extends Controller
{
    public function show(Request $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        $user = $request->user();
        $profesori = $odeljenje->profesori;
        $auth = false;
        $responseService = new ResponseService;

        if ($ucenik->odeljenje->id != $odeljenje->id) {
            return $responseService->response(false, 404, "U traženom odeljenju ne postoji ovaj učenik");
        }
        foreach ($profesori as $profesor) {
            if ($profesor->id == $user->id) {
                $auth = true;
            }
        }
        if (!$auth) return $responseService->response(false, 403, "Nemate pristup ovom učeniku jer mu niste profesor");

        $ocene = $ucenik->ocene;
        $ocenePredmet =  [];
        foreach ($ocene as $ocena) {
            if ($ocena->id_predmet == $user->id_predmet) $ocenePredmet[] = $ocena->vrednost;
        }
        $data = ["Odeljenje" => $odeljenje->naziv, "Ucenik" => ucfirst($ucenik->ime) . " " . ucfirst($ucenik->prezime), "Predmet" => $user->predmet->ime_predmeta, "Ocene" => $ocenePredmet];
        return $responseService->response(true, 200, "success", $data);
    }


    public function showRazredni(Request $request, Ucenik $ucenik)
    {


        $user = $request->user();
        $responseService = new ResponseService;

        //Provera da li ima dozvolu za pregled
        if ($ucenik->odeljenje->razredni->id != $user->id) {
            return  $responseService->response(false, 403, "Nemate pristup ovom učeniku jer mu niste razredni starešina");
        }
        $odeljenje = $ucenik->odeljenje;
        $ocene = $ucenik->ocene;
        $predmeti = $odeljenje->predmeti;

        $predmetiOcene = [];

        foreach ($predmeti as $predmet) {
            $ocenePredmet = [];
            foreach ($ocene as $ocena) {
                if ($ocena->predmet->ime_predmeta == $predmet->ime_predmeta) {
                    $ocenePredmet[]  = $ocena->vrednost;
                }
            }
            $imePredmeta = $predmet->ime_predmeta;

            $predmetiOcene[] = ["Predmet" => $imePredmeta, "Ocene" => $ocenePredmet];
        }

        $data = ["Odeljenje" => $odeljenje->naziv, "Ucenik" => ucfirst($ucenik->ime) .  " " . ucfirst($ucenik->prezime), "Predmeti i ocene" => $predmetiOcene];
        return $responseService->response(true, 200, "success", $data);
    }




    public function store(UcenikStoreRequest $request)
    {
        $responseService = new ResponseService;
        $razredni = $request->user();
        if (!$razredni->is_razredni) {
            return $responseService->response(false, 403, "Samo razredni starešina može dodavati učenike");
        }
        $ucenik = new Ucenik;
        $ucenikStoreService = new UcenikStoreService;
        $ucenikStoreService->store($request, $razredni, $ucenik);
        return $responseService->response(true, 200, "Uspešno ste sačuvali učenika", $ucenik);
    }
}
