<?php

namespace App\Services\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService
{
    /**
     * Attempt to log in a dashboard user.
     *
     * @param string $email
     * @param string $password
     * @param bool $remember
     * @return bool
     * @throws ValidationException
     */
    public function attemptLogin(string $email, string $password, bool $remember = false): bool
    {
        if (Auth::guard('dashboard')->attempt(['email' => $email, 'password' => $password], $remember)) {
            // Regenerate the user session to secure it
            request()->session()->regenerate();
            return true;
        }

        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }
}
