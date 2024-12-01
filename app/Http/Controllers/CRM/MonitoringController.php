<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
    public function index(): View
    {
        $section = 1;
        $page = 'Monitoring';
        $subpage = null;

        return view('crm.monitoring', [
            'section' => $section,
            'page' => $page,
            'subpage' => $subpage
        ]);
    }
}
