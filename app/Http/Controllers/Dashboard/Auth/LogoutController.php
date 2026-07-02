<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the user logout.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('dashboard')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login')
            ->with('success', 'You have been logged out successfully.');
    }
}
