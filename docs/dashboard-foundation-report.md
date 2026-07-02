# CCESS CMS Dashboard Foundation Report

This document outlines the architecture, setup instructions, validation tests, and credentials for the CCESS CMS Dashboard.

---

## 1. Project Overview & Guard Separation

The CMS Dashboard foundation is built using **Laravel 10.x** (compatible with PHP 8.1+) and uses the **Skyline Admin Dashboard** Bootstrap 4 assets.

### Dedicated Authentication Guard
To keep CMS dashboard authentication separate from the public front-end user space:
- **Default Guard (`web`)**: Retained mapping to the default `App\Models\User` via the `users` provider.
- **Dedicated Guard (`dashboard`)**: Dedicated guard configured using Laravel's session driver, mapping to `App\Models\DashboardUser` via the `dashboard_users` provider.

**Guards and Providers configuration (`config/auth.php`):**
```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'dashboard' => [
        'driver' => 'session',
        'provider' => 'dashboard_users',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'dashboard_users' => [
        'driver' => 'eloquent',
        'model' => App\Models\DashboardUser::class,
    ],
],
```

---

## 2. Authentication & Session Control

*   **Web/Session-Based Auth**: The login uses Laravel session cookies, middleware validation layers, CSRF protection, and route-based redirections. No JWT, Sanctum tokens, or stateless headers are used.
*   **Guard Middleware Routing**:
    *   Guest routes (Login screen and post action) are protected via the `guest:dashboard` middleware.
    *   Dashboard landing, profile, and logout actions are protected via the `auth:dashboard` middleware.
    *   Unauthenticated dashboard requests redirect automatically to `route('dashboard.login')` (configured in `Authenticate.php` middleware).
*   **Session Security**:
    *   On login, the session is regenerated (`request()->session()->regenerate()`) to defend against session fixation.
    *   On logout, the user session is invalidated (`$request->session()->invalidate()`) and the CSRF token is regenerated.
*   **Sanctum Status**: Fully uninstalled. `laravel/sanctum` was removed from `composer.json` and `composer.lock`, the config file deleted, default routes removed from `routes/api.php`, and middleware lines disabled.

---

## 3. Database Schema, Seeds & Credentials

### CMS Database Schema
The database uses **SQLite** for local development. Tables migrated:
- `password_reset_tokens`
- `failed_jobs`
- `dashboard_users` (stores `name`, `email`, `password`, `role` as `unsignedTinyInteger`, and `permissions` as `json`)

### Local Credentials
The DatabaseSeeder populates the initial Super Admin:
- **Login URL**: `/dashboard/login`
- **Email**: `admin@ccess.com`
- **Password**: `Password123!`
- **Role**: `SUPER_ADMIN` (defined via Bensampo Enum `App\Enums\DashboardUserRole`)

---

## 4. How to Make It Work (Local Setup Guide)

Follow these steps to run the CMS dashboard locally on your system:

### Step 1: Install Dependencies
Ensure you have PHP 8.1+ and Composer installed. From the project directory, run:
```bash
composer install
```

### Step 2: Configure Environment
Copy the `.env.example` file (which is pre-configured for SQLite) to `.env`:
```bash
cp .env.example .env
```
Ensure that `DB_CONNECTION=sqlite` is active in `.env`, and create the database file:
```bash
touch database/database.sqlite
```

### Step 3: Run Database Migrations and Seed
Initialize the database tables and insert the Super Admin seed record:
```bash
php artisan migrate:fresh --seed
```

### Step 4: Run the Local Server
Start Laravel's built-in local development server:
```bash
php artisan serve
```
By default, the server runs on `http://127.0.0.1:8000`. Navigate to:
- `http://127.0.0.1:8000/dashboard`

---

## 5. Verification and Code Tests

To programmatically verify that all authentication guards, form requests, updates, and redirects are working, we added a complete feature test suite inside `tests/Feature/DashboardAuthTest.php`.

Run the test suite using:
```bash
php artisan test
```

### Test Suite Execution Output
```
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\DashboardAuthTest
  ✓ unauthenticated users are redirected to login                                                                0.26s  
  ✓ users can view login page                                                                                    0.12s  
  ✓ users can login with valid credentials                                                                       0.03s  
  ✓ users cannot login with invalid credentials                                                                  0.22s  
  ✓ authenticated users can update profile info                                                                  0.03s  
  ✓ authenticated users can update password                                                                      0.02s  
  ✓ authenticated users can logout                                                                               0.01s  

   PASS  Tests\Feature\ExampleTest
  ✓ the application returns a successful response                                                                0.01s  

  Tests:    9 passed (29 assertions)
  Duration: 0.94s
```

All 9 tests passed successfully, confirming that the foundation works perfectly and is ready for module-by-module CRUD development.
