<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OcenaStoreRequest;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Services\OcenaStoreService;
use Illuminate\Support\Facades\Auth;
use App\Services\ResponseService;

class OcenaApiController extends Controller
{

    public function store(OcenaStoreRequest $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        // $profesor = Auth::user();
        $responseService = new ResponseService;
        $profesor = $request->user();
        if (!($ucenik->odeljenje->id == $odeljenje->id)) {
            return $responseService->response(false, 404, "Nepostojeći učenik");
        }
        $odeljenja = $profesor->odeljenja;
        foreach ($odeljenja as $od) {
            if (($odeljenje->id == $od->id)) {
                return $responseService->response(false, 403, "Ne predajete ovom odeljenju!");
            }
        }


        $storeService = new OcenaStoreService;
        $ocena = $storeService->store($request, $profesor, $ucenik);
        return $responseService->response(true, 200, "Succsessfuly added", $ocena);
    }

    public function show(Request $request, Ucenik $ucenik, Ocena $ocena)
    {
        $user = $request->user();
        $odeljenje = $ucenik->odeljenje;
        $responseService = new ResponseService;
        if (!($ucenik->id == $ocena->id_ucenik)) {
            return $responseService->response(false, 404, "Nepostojeća ocena");
        }
        if (Auth::guard('admin')->check()) {
            if ($user->is_razredni) {
                if (!($user->odeljenje == $odeljenje)) {
                    return $responseService->response(false, 403, "Niste razredni ovom učeniku");
                }
            } else {
                if (!($user->id == $ocena->id_profesor)) {
                    return $responseService->response(false, 403, "Pristup ovoj adresi ima samo razredni starešina");
                }
            }
        }

        $data = [
            "Ocena" => $ocena->vrednost, "Opis" => $ocena->opis,
            "Profesor" => ucfirst($ocena->profesor->ime) . " " . ucfirst($ocena->profesor->prezime), "Učenik" => ucfirst($ucenik->ime) . " " . ucfirst($ucenik->prezime), "Vreme" => $ocena->created_at
        ];
        return  $responseService->response(true, 200, "success", $data);
    }


    public function showProfesor(Request $request, Odeljenje $odeljenje, Ucenik $ucenik, Ocena $ocena)
    {
        $responseService = new ResponseService;
        $user = $request->user();
        if (!($odeljenje == $ucenik->odeljenje)) {
            return $responseService->response(false, 404, "Nepostojeći učenik");
        };

        if (!($ucenik->id == $ocena->id_ucenik)) {
            return $responseService->response(false, 404, "Nepostojeća ocena");
        }
        if (Auth::guard('admin')->check()) {
            if (!($user->id == $ocena->id_profesor)) {
                return $responseService->response(false, 403, "Ne predajete ovom učeniku");
            }
        }

        $data = [
            "Ocena" => $ocena->vrednost, "Opis" => $ocena->opis,
            "Profesor" => ucfirst($ocena->profesor->ime) . " " . ucfirst($ocena->profesor->prezime), "Učenik" => ucfirst($ucenik->ime) . " " . ucfirst($ucenik->prezime), "Vreme" => $ocena->created_at
        ];
        return $responseService->response(true, 200, "success", $data);
    }
}
