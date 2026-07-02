<?php

namespace App\Services\Dashboard;

use App\Models\DashboardUser;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    /**
     * Update the authenticated user's profile details.
     */
    public function updateProfile(DashboardUser $user, array $data): DashboardUser
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return $user;
    }

    /**
     * Update the authenticated user's password.
     */
    public function updatePassword(DashboardUser $user, string $newPassword): DashboardUser
    {
        $user->password = Hash::make($newPassword);
        $user->save();

        return $user;
    }
}
