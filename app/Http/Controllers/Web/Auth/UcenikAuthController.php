<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class UcenikAuthController extends Controller
{
    public function loginShow()
    {
        return view('auth.ucenik_login');
    }

    public function login(LoginRequest $request)
    {
        $service = new AuthService();
        $success = $service->login(
            'web',
            $request->input('email'),
            $request->input('password')
        );

        return $success ?
            redirect()->route('index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni kredencijali',
            ]);
    }

    public function logout()
    {
        $service = new AuthService();
        $service->logout('web');

        return redirect()->route('ucenik.login.show');
    }
}
