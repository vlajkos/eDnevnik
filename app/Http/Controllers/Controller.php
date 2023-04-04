<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Odeljenje;
use App\Models\Profesor;
use Illuminate\Http\Request;



class Controller extends BaseController
{

    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $profesor = $request->user();


        return view("clients")->with(["loggedUser" => $profesor]);;
    }
    public function index2()
    {

        return view("auth/login");
    }
}
