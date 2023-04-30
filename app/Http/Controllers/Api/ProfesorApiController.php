<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Predmet;
use App\Services\ResponseService;

class ProfesorApiController extends Controller
{
    public function index(Request $request)
    {
        $responseService = new ResponseService;
        if (!$request->user()->is_razredni) {
            return $responseService->response(false, 403, "Nemate pristup svim profesorima jer niste razredni starešina");
        }
        $profesori = Profesor::all();
        $predmeti = Predmet::all();
        $predmetProfesor = [];

        foreach ($predmeti as $predmet) {
            $profesoriArr = [];
            foreach ($profesori as $profesor) {
                if ($predmet->id == $profesor->id_predmet) {
                    $profesoriArr[] = ["Profesor" => ucfirst($profesor->ime) . " " . ucfirst($profesor->prezime), "id_profesor" => $profesor->id];
                }
            }

            $predmetProfesor[] = [
                "Predmet" => $predmet->ime_predmeta,
                "id_predmet" => $predmet->id,
                "Profesori" => $profesoriArr,

            ];
        }
        return $responseService->response(true, 200, "success", $predmetProfesor);
    }
}
