<?php

namespace Tests\Feature;

use App\Models\DashboardUser;
use App\Enums\DashboardUserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a default Super Admin user for testing
        DashboardUser::create([
            'name' => 'Super Admin',
            'email' => 'admin@ccess.com',
            'password' => bcrypt('Password123!'),
            'role' => DashboardUserRole::SUPER_ADMIN,
            'permissions' => [],
        ]);
    }

    /**
     * Test that unauthenticated users are redirected to login.
     */
    public function test_unauthenticated_users_are_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/login');
    }

    /**
     * Test that users can see the login page.
     */
    public function test_users_can_view_login_page(): void
    {
        $response = $this->get('/dashboard/login');
        $response->assertStatus(200);
        $response->assertSee('Please Login to your Account');
    }

    /**
     * Test successful login.
     */
    public function test_users_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/dashboard/login', [
            'email' => 'admin@ccess.com',
            'password' => 'Password123!',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs(DashboardUser::first(), 'dashboard');
    }

    /**
     * Test login failure with invalid credentials.
     */
    public function test_users_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('/dashboard/login', [
            'email' => 'admin@ccess.com',
            'password' => 'WrongPassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest('dashboard');
    }

    /**
     * Test profile details update.
     */
    public function test_authenticated_users_can_update_profile_info(): void
    {
        $user = DashboardUser::first();

        $response = $this->actingAs($user, 'dashboard')
            ->put('/dashboard/profile', [
                'name' => 'Updated Admin Name',
                'email' => 'newadmin@ccess.com',
            ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/profile');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('dashboard_users', [
            'id' => $user->id,
            'name' => 'Updated Admin Name',
            'email' => 'newadmin@ccess.com',
        ]);
    }

    /**
     * Test password update.
     */
    public function test_authenticated_users_can_update_password(): void
    {
        $user = DashboardUser::first();

        $response = $this->actingAs($user, 'dashboard')
            ->put('/dashboard/profile/password', [
                'current_password' => 'Password123!',
                'password' => 'NewSecurePassword123!',
                'password_confirmation' => 'NewSecurePassword123!',
            ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/profile');
        $response->assertSessionHas('success');
    }

    /**
     * Test secure logout.
     */
    public function test_authenticated_users_can_logout(): void
    {
        $user = DashboardUser::first();

        $response = $this->actingAs($user, 'dashboard')
            ->post('/dashboard/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/login');
        $this->assertGuest('dashboard');
    }
}
