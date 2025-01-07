<?php

namespace App\Http\Controllers\CRM\Administration;

use App\Models\Company;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;

use App\Http\Requests\CRM\Administration\Companies\StoreRequest;
use App\Http\Requests\CRM\Administration\Companies\UpdateRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Company::class);

        if (auth()->user()->isAdmin()) {
            $companies = Company::all();
        } else {
            $companies = Company::where('id', auth()->user()->company_id)
                ->get();
        }

        return view('crm.administration.companies.index', [
            'section' => 2,
            'page' => 'Companies',
            'subPage' => null,
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Company::class);

        $latestCompanies = Company::limit(10)
            ->latest()
            ->get();

        return view('crm.administration.companies.create', [
            'section' => 2,
            'page' => 'Companies',
            'subPage' => 'Create',
            'latestCompanies' => $latestCompanies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address
        ]);

        return redirect()
            ->route('crm.administration.companies.index')
            ->with('success', 'Company was successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View
    {
        $this->authorize('view', Company::class);

        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->company_id !== $company->id) {
                abort(404);
            }
        }

        $users = $company->users()
            ->orderBy('role_id')
            ->get();

        return view('crm.administration.companies.show', [
            'section' => 2,
            'page' => 'Companies',
            'subPage' => $company->name,
            'company' => $company,
            'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        $this->authorize('update', Company::class);

        return view('crm.administration.companies.edit', [
            'section' => 2,
            'page' => 'Companies',
            'subPage' => $company->name,
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Company $company): RedirectResponse
    {
        $company->update([
            'name' => $request->name,
            'email' => $company->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address
        ]);

        return redirect()
            ->back()
            ->with('success', 'Company was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->authorize('delete', Company::class);

        $company->delete();

        return redirect()
            ->back()
            ->with('success', 'Company was successfully deleted.');
    }
}
