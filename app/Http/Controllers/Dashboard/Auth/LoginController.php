<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Services\Dashboard\Auth\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    protected LoginService $loginService;

    /**
     * Inject LoginService dependency.
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Display the login form.
     */
    public function showLoginForm(): View
    {
        return view('dashboard.auth.login');
    }

    /**
     * Handle authentication submission.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $this->loginService->attemptLogin(
            $request->input('email'),
            $request->input('password'),
            $request->filled('remember')
        );

        return redirect()->intended(route('dashboard.index'))
            ->with('success', 'Welcome back!');
    }
}
