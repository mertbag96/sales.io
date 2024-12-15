<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index(): View
    {
        return view('crm.notifications', [
            'section' => 0,
            'page' => 'Notifications',
            'subPage' => null
        ]);
    }
}
