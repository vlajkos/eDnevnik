<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ucenik;
use App\Models\Odeljenje;

class UcenikApiController extends Controller
{
    public function show(Request $request, Odeljenje $odeljenje, Ucenik $ucenik)
    {
        return response()->json(["Odeljenje" => $odeljenje, "Ucenik" => $ucenik]);
    }
}
