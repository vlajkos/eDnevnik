<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OcenaStoreRequest;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Services\OcenaStoreService;

class OcenaApiController extends Controller
{

    public function store(OcenaStoreRequest $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        // $profesor = Auth::user();
        $profesor = $request->user();
        $storeService = new OcenaStoreService;
        $ocena = $storeService->store($request, $profesor, $ucenik);
        return response()->json(["success" => true, "ocena" => $ocena]);
    }
}
