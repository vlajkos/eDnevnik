<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class ProfesorAuthController extends Controller
{
    public function loginShow()
    {
        return view('auth.profesor_login');
    }

    public function login(LoginRequest $request)
    {
        $service = new AuthService();
        $success = $service->login(
            'admin',
            $request->input('email'),
            $request->input('password')
        );

        return $success ?
            redirect()->route('profesori.index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni kredencijali',
            ]);
    }

    public function logout()
    {
        $service = new AuthService();
        $service->logout('admin');

        return redirect()->route('profesor.login.show');
    }
}
