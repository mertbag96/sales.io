<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
    public function index(): View
    {
        return view('crm.monitoring', [
            'section' => 1,
            'page' => 'Monitoring',
            'subPage' => null
        ]);
    }
}
