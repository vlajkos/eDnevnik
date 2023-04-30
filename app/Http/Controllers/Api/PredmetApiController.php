<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PredmetProfesorStoreRequest;
use App\Http\Requests\PredmetProfesorDeleteRequest;
use App\Services\PredmetProfesorStoreService;
use App\Models\Odeljenje_profesor;
use App\Models\Odeljenje_predmet;
use App\Models\Predmet;
use App\Models\Profesor;
use App\Services\ResponseService;

use function Symfony\Component\String\b;

class PredmetApiController extends Controller
{
    public function index(Request $request)
    {
        $responseService = new ResponseService;
        $user = $request->user();
        if (!$user->is_razredni) {
            return $responseService->response(false, 403, "Niste razredni starešina");
        }
        $razredni = $user;

        $predmeti = $razredni->odeljenje->predmeti;
        $profesori = $razredni->odeljenje->profesori;

        $predmetProfesor = [];
        foreach ($predmeti as $predmet) {
            foreach ($profesori as $profesor) {
                if ($profesor->id_predmet === $predmet->id) {
                    $predmetProfesor[] = ["Predmet" => $predmet->ime_predmeta, "Profesor" =>
                    ucfirst($profesor->ime) . " " . ucfirst($profesor->prezime), "id_predmet" => $predmet->id, "id_profesor" => $profesor->id,];
                    break;
                }
            }
        }
        return $responseService->response(true, 200, "success", $predmetProfesor);
    }


    public function store(PredmetProfesorStoreRequest $request)
    {
        $user = $request->user();
        $responseService = new ResponseService;
        if (!$user->is_razredni) {
            return $responseService->response(false, 403, "Ne možete dodavati predmete jer niste razredni starešina!");
        }
        $id_predmet = $request->input('id_predmet');
        $id_profesor = $request->input('id_profesor');
        $predmet = Predmet::findOrFail($id_predmet);
        $profesor = Profesor::findorFail($id_profesor);
        $razredni = $user;
        $odeljenje = $razredni->odeljenje;
        $storeService = new PredmetProfesorStoreService;
        $storeService->store($request, $odeljenje->id);
        $data = ["predmet" => $predmet, "profesor" => $profesor];
        return $responseService->response(true, 200, "Uspešno ste dodali predmet i profesora", $data);
    }


    public function destroy(PredmetProfesorDeleteRequest $request)
    {
        $responseService = new ResponseService;
        $user = $request->user();
        if (!$user->is_razredni) {
            return $responseService->response(false, 403, "Ne možete brisati predmete jer niste razredni starešina!");
        }
        $razredni = $user;
        $odeljenje = $razredni->odeljenje;
        $id_odeljenje = $odeljenje->id;
        $id_predmet = $request->id_predmet;
        $profesori = $odeljenje->profesori;
        $profesorPredmet = false;

        $predmet = Predmet::findOrFail($id_predmet);


        Odeljenje_predmet::where('id_odeljenje', $id_odeljenje)->where('id_predmet', $id_predmet)->delete();

        foreach ($profesori as $profesor) {
            if ($profesor->id_predmet == $id_predmet) {
                $profesorPredmet = $profesor;
                break;
            }
        }
        if ($profesorPredmet) {
            $id_profesor = $profesorPredmet->id;
            Odeljenje_profesor::where('id_odeljenje', $id_odeljenje)->where('id_profesor', $id_profesor)->delete();
        } else {
            return $responseService->response(true, 200, "Uspešno ste obrisali traženi predmet", $predmet);
        }
        $data = ["predmet" => $predmet, "profesor" => $profesor];
        return $responseService->response(true, 200, "Uspešno ste obrisali traženi predmet i profesora koji taj predmet predaje", $data);
    }
}
