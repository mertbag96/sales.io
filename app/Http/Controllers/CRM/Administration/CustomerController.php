<?php

namespace App\Http\Controllers\CRM\Administration;

use Illuminate\View\View;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $section = 2;
        $page = 'Customers';
        $subpage = null;

        return view('crm.administration.customers.index', [
            'section' => $section,
            'page' => $page,
            'subpage' => $subpage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $section = 2;
        $page = 'Customers';
        $subpage = 'Create';

        return view('crm.administration.customers.create', [
            'section' => $section,
            'page' => $page,
            'subpage' => $subpage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $section = 2;
        $page = 'Customers';

        return view('crm.administration.customers.show', [
            'section' => $section,
            'page' => $page,
            'subpage' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $section = 2;
        $page = 'Customers';

        return view('crm.administration.customers.edit', [
            'section' => $section,
            'page' => $page,
            'subpage' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
