<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthenticationService
{
    public function login(string $guard, string $email, string $password): bool
    {

        if ($guard = "ucenik") {
            return Auth::guard($guard)->attempt([
                'email' => $email,
                'jmbg' => $password,
            ]);
        } else {
            return Auth::guard($guard)->attempt([
                'email' => $email,
                'lozinka' => $password,
            ]);
        }
    }

    public function logout(string $guard)
    {
        Auth::guard($guard)->logout();
        session()->flush();
        session()->regenerate();
    }
}
