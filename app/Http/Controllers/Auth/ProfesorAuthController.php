<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequestProfesor;
use App\Services\AuthenticationService;

class ProfesorAuthController extends Controller
{
    // public function loginShow()
    // {
    //     return view('auth.admin_login');
    // }

    public function login(LoginRequestProfesor $request)
    {
        $service = new AuthenticationService();
        $success = $service->login(
            'profesor',
            $request->input('email'),
            $request->input('lozinka')
        );

        return $success ?
            redirect()->route('profesori.index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni podaci',
            ]);
    }

    public function logout()
    {
        $service = new AuthenticationService();
        $service->logout('profesor');

        return redirect()->route('login.show');
    }
}
