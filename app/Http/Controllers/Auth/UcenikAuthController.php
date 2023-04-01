<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequestUcenik;
use App\Services\AuthenticationService;

class UcenikAuthController extends Controller
{
    // public function loginShow()
    // {
    //     return view('auth.admin_login');
    // }

    public function login(LoginRequestUcenik $request)
    {
        $service = new AuthenticationService();
        $success = $service->login(
            'ucenik',
            $request->input('email'),
            $request->input('jmbg')
        );

        return $success ?
            redirect()->route('ucenici.index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni podaci',
            ]);
    }

    public function logout()
    {
        $service = new AuthenticationService();
        $service->logout('ucenik');

        return redirect()->route('login.show');
    }
}
