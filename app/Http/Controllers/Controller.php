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
    use AuthorizesRequests, ValidatesRequests;
}
