<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $guard, string $email, string $password): bool
    {


        return Auth::guard($guard)->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function logout(string $guard)
    {
        Auth::guard($guard)->logout();
        session()->flush();
        session()->regenerate();
    }
}
