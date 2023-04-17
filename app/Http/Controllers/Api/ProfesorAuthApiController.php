<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class ProfesorAuthApiController extends Controller
{

    public function login(LoginRequest $request)
    {
        $service = new AuthService();
        $success = $service->login(
            'admin',
            $request->input('email'),
            $request->input('password')
        );

        return  response()->json(["success" => $success]);
    }
    public function logout()
    {
        $service = new AuthService();
        $service->logout('admin');

        return response()->json(["success" => true]);
    }
}
