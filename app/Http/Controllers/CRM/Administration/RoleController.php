<?php

namespace App\Http\Controllers\CRM\Administration;

use App\Models\Role;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;

use App\Http\Requests\CRM\Administration\Roles\StoreRequest;
use App\Http\Requests\CRM\Administration\Roles\UpdateRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::all();

        return view('crm.administration.roles.index', [
            'section' => 2,
            'page' => 'Roles',
            'subPage' => null,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Role::class);

        $latestRoles = Role::latest()
            ->limit(5)
            ->get();

        return view('crm.administration.roles.create', [
            'section' => 2,
            'page' => 'Roles',
            'subPage' => 'Create',
            'latestRoles' => $latestRoles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Role::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()
            ->route('crm.administration.roles.index')
            ->with('success', 'Role was successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        $this->authorize('view', Role::class);

        return view('crm.administration.roles.show', [
            'section' => 2,
            'page' => 'Roles',
            'subPage' => $role->name,
            'role' => $role,
            'users' => $role->users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $this->authorize('update', Role::class);

        return view('crm.administration.roles.edit', [
            'section' => 2,
            'page' => 'Roles',
            'subPage' => $role->name,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Role $role): RedirectResponse
    {
        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()
            ->back()
            ->with('success', 'Role was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->authorize('delete', Role::class);

        if ($role->id === 1) {
            abort(403);
        }

        $role->delete();

        return redirect()
            ->back()
            ->with('success', 'Role was successfully deleted.');
    }
}
