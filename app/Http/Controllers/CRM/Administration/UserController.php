<?php

namespace App\Http\Controllers\CRM\Administration;

use App\Models\User;
use App\Models\Role;
use App\Models\Company;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests\CRM\Administration\Users\StoreRequest;
use App\Http\Requests\CRM\Administration\Users\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::whereIn('role_id', [1, 2, 3])->get();

        $pendingUsers = User::where('role_id', 0)->get();

        return view('crm.administration.users.index', [
            'section' => 2,
            'page' => 'Users',
            'subPage' => null,
            'users' => $users,
            'pendingUsers' => $pendingUsers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::whereNot('id', 4)->get();

        $companies = Company::select('id', 'name')->get();

        $latestUsers = User::whereIn('role_id', [1, 2, 3])
            ->limit(10)
            ->latest()
            ->get();

        return view('crm.administration.users.create', [
            'section' => 2,
            'page' => 'Users',
            'subPage' => 'Create',
            'roles' => $roles,
            'companies' => $companies,
            'latestUsers' => $latestUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $request->company == 0 ? $company = null : $company = $request->company;

        User::create([
            'role_id' => $request->role,
            'company_id' => $company,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()
            ->route('crm.administration.users.index')
            ->with('success', 'User was successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('crm.administration.users.show', [
            'section' => 2,
            'page' => 'Users',
            'subPage' => $user->fullName,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::whereNot('id', 4)->get();

        $companies = Company::select('id', 'name')->get();

        return view('crm.administration.users.edit', [
            'section' => 2,
            'page' => 'Users',
            'subPage' => $user->fullName,
            'user' => $user,
            'roles' => $roles,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $data = [
            'role' => $request->role,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ];

        if ((int) $request->company != null) {
            $data['company_id'] = (int) $request->company;
        }

        if (isset($request->password)) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()
            ->back()
            ->with('success', 'User was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->back()
            ->with('success', 'User was successfully deleted.');
    }
}
