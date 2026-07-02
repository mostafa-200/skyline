<?php

namespace App\Models;

use App\Enums\DashboardUserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DashboardUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'dashboard_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'role' => 'integer',
        'permissions' => 'array',
    ];

    /**
     * Determine if the user is a super admin.
     *
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return (int)$this->role === DashboardUserRole::SUPER_ADMIN;
    }

    /**
     * Check if the user has a specific permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        return is_array($this->permissions) && in_array($permission, $this->permissions);
    }
}
