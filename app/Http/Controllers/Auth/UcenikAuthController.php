<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequestUcenik;
use App\Services\UcenikAuthService;

class UcenikAuthController extends Controller
{
    public function loginShow()
    {
        return view('auth.login');
    }

    public function login(LoginRequestUcenik $request)
    {
        $service = new UcenikAuthService();
        $success = $service->login(
            'ucenik',
            $request->input('email'),
            $request->input('jmbg')
        );

        return $success ?
            redirect()->route('ucenici.index') :
            redirect()->back()->withErrors([
                'email' => 'Neispravni kredencijali',
            ]);
    }

    public function logout()
    {
        $service = new UcenikAuthService();
        $service->logout('ucenik');

        return redirect()->route('login.show');
    }
}
