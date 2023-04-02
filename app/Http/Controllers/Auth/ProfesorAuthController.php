<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequestProfesor;
use App\Services\ProfesorAuthService;

class ProfesorAuthController extends Controller
{
    public function loginShow()
    {
        return view('auth.login');
    }

    public function login(LoginRequestProfesor $request)
    {
        $service = new ProfesorAuthService();
        $success = $service->login(
            'profesor',
            $request->input('email'),
            $request->input('lozinka')
        );

        return $success ?
            redirect()->route('profesori.index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni kredencijali',
            ]);
    }

    public function logout()
    {
        $service = new ProfesorAuthService();
        $service->logout('profesor');

        return redirect()->route('login.show');
    }
}
