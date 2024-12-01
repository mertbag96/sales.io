<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): View
    {
        $section = 1;
        $page = 'Dashboard';
        $subpage = null;

        return view('crm.dashboard', [
            'section' => $section,
            'page' => $page,
            'subpage' => $subpage
        ]);
    }
}
