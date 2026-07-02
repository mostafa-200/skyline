<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\DashboardUser::create([
            'name' => 'Super Admin',
            'email' => 'admin@ccess.com',
            'password' => bcrypt('Password123!'),
            'role' => \App\Enums\DashboardUserRole::SUPER_ADMIN,
            'permissions' => [],
        ]);
    }
}
