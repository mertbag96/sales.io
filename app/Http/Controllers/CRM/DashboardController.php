<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('crm.dashboard');
    }
}
