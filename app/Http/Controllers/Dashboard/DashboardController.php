<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the CMS dashboard landing page.
     */
    public function index(): View
    {
        return view('dashboard.index');
    }
}
