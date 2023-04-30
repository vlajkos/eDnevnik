<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Services\ResponseService;

class ProfesorAuthApiController extends Controller
{

    public function login(LoginRequest $request)
    {
        $responseService = new ResponseService;
        $service = new AuthService();
        $success = $service->login(
            'admin',
            $request->input('email'),
            $request->input('password')
        );

        return  $responseService->response(true, 200, "Uspešno logovanje");
    }
    public function logout()
    {
        $responseService = new ResponseService;
        $service = new AuthService();
        $service->logout('admin');

        return  $responseService->response(true, 200, "Uspešno ste se izlogovali");
    }
}
