<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index(): View
    {
        $section = 0;
        $page = 'Notifications';
        $subpage = null;

        return view('crm.notifications', [
            'section' => $section,
            'page' => $page,
            'subpage' => $subpage
        ]);
    }
}
