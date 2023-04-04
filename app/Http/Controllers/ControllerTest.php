<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTest extends Controller
{
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
