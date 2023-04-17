<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Odeljenje;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class Controller extends BaseController
{


    public function getWeatherData()
    {
        $response = Http::delete('http://api.weatherstack.com/current
        ? access_key = 526ac69ccbedfa6b035f2cd59d829a09
        & query = Mladenovac');

        $jsonData = $response->json();


        return $jsonData;;
    }
    use AuthorizesRequests, ValidatesRequests;
}
