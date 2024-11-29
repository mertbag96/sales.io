<?php

namespace App\Http\Controllers\CRM;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(): View
    {
        $section = 0;
        $page = 'Profile';

        return view('crm.profile', [
            'section' => $section,
            'page' => $page
        ]);
    }
}
