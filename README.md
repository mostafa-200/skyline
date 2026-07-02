# CCESS CMS Dashboard

This is the Web/session-based CMS Dashboard foundation for the CCESS website. It utilizes **Laravel 10.x** for the backend architecture, custom security guards, and the **Skyline Admin Template** for its user interface.

---

## Do I Need XAMPP?

**No, you do not need XAMPP.**
- **Database**: The application uses **SQLite** (`database/database.sqlite`). This is a file-based database that runs inside your PHP process. It does not require a running database server process like MySQL/MariaDB (which is what XAMPP provides).
- **Web Server**: Laravel provides its own lightweight local development web server using Artisan. You do not need Apache (which is also in XAMPP) to host the files locally.
- **PHP & Composer**: Since you already have PHP 8.1.25 and Composer installed globally on your machine, you can run everything directly from your command line.

---

## Detailed Local Setup Guide

Follow these steps in your terminal to set up and run the dashboard:

### Step 1: Open the Terminal & Navigate
Open PowerShell or your command line and navigate to the project directory:
```powershell
cd c:\Users\DELL\Downloads\skyline\skyline
```

### Step 2: Install PHP Dependencies
Download and install the required vendor packages listed in `composer.json` (such as the Bensampo Enum package):
```bash
composer install
```

### Step 3: Configure the Environment Variables
1. Copy the pre-configured `.env.example` file to create your local `.env`:
   ```powershell
   Copy-Item -Path ".env.example" -Destination ".env" -Force
   ```
2. Open the `.env` file and confirm that the SQLite driver is configured:
   ```ini
   DB_CONNECTION=sqlite
   ```

### Step 4: Create the SQLite Database File
Create an empty database file in the `database` folder:
```powershell
New-Item -Path "database/database.sqlite" -ItemType File -Force
```

### Step 5: Build Tables and Seed Super Admin
Run migrations to build the custom `dashboard_users` schema and insert the Super Admin user:
```bash
php artisan migrate:fresh --seed
```

### Step 6: Start the Development Server
Launch the PHP web server:
```bash
php artisan serve
```
By default, the server will host the application at `http://127.0.0.1:8000`.

### Step 7: Open the Dashboard & Log In
1. Open your browser and go to:
   **[http://127.0.0.1:8000/dashboard](http://127.0.0.1:8000/dashboard)**
2. The page will automatically redirect you to the secure login form:
   **[http://127.0.0.1:8000/dashboard/login](http://127.0.0.1:8000/dashboard/login)**
3. Use the seeded Super Admin credentials to log in:
   - **Email Address**: `admin@ccess.com`
   - **Password**: `Password123!`

---

## Running the Automated Checks

We have included a full automated test suite to verify the authentication guard logic, session security redirects, and profile/password validations.

To run the checks, open a new terminal window in the project folder and execute:
```bash
php artisan test
```

---

## Project Structure Overview

- **Guard Isolation**: Custom guard `dashboard` (defined in `config/auth.php`) manages dashboard session states independently from the default `web` guard.
- **Routing**: Session routing configured in `routes/web.php` with `guest:dashboard` and `auth:dashboard` middleware restrictions.
- **Blade Components**: Clean, reusable layouts and forms under `resources/views/dashboard/components/ui/` (inputs, textareas, selects, custom toggles, etc.).
- **Controllers & Services**: Controller classes parse input validation via Form Requests, delegating database writing operations to separate Service files.
- **Full Report**: Refer to [docs/dashboard-foundation-report.md](file:///c:/Users/DELL/Downloads/skyline/skyline/docs/dashboard-foundation-report.md) for full architectural details.
