<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('crm.dashboard', [
            'section' => 1,
            'page' => 'Dashboard',
            'subPage' => null
        ]);
    }
}
