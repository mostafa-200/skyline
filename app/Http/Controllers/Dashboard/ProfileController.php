<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Profile\UpdatePasswordRequest;
use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;
use App\Services\Dashboard\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    protected ProfileService $profileService;

    /**
     * Inject ProfileService dependency.
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Show the profile edit form.
     */
    public function edit(): View
    {
        return view('dashboard.profile.edit');
    }

    /**
     * Update the user profile details.
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $this->profileService->updateProfile(
            auth()->user(),
            $request->validated()
        );

        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the user password.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->profileService->updatePassword(
            auth()->user(),
            $request->validated()['password']
        );

        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'Password updated successfully.');
    }
}
