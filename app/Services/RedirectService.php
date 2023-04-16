<?php

namespace App\Services;

class RedirectService
{
    function redirectProfesor($profesor)
    {
        if ($profesor->is_razredni) {
            return view('index')->with(["loggedUser" => $profesor]);
        } else {
            return redirect()->route('odeljenja')->with(["odeljenja" => $profesor->odeljenja]);
        }
    }
}
