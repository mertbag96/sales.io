<?php

namespace App\Http\Controllers\CRM\Administration;

use App\Models\User;
use App\Models\Customer;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;

use App\Http\Requests\CRM\Administration\Customers\StoreRequest;
use App\Http\Requests\CRM\Administration\Customers\UpdateRequest;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewany', Customer::class);

        $users = User::with('customer')
            ->where('role_id', 4)
            ->get();

        return view('crm.administration.customers.index', [
            'section' => 2,
            'page' => 'Customers',
            'subPage' => null,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Customer::class);

        $latestCustomers = Customer::with('user')
            ->limit(10)
            ->latest()
            ->get();

        return view('crm.administration.customers.create', [
            'section' => 2,
            'page' => 'Customers',
            'subPage' => 'Create',
            'latestCustomers' => $latestCustomers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $user = User::create([
            'role_id' => 4,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($user) {
            Customer::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
        }

        return redirect()
            ->route('crm.administration.customers.index')
            ->with('success', 'Customer was successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View
    {
        $this->authorize('view', Customer::class);

        return view('crm.administration.customers.show', [
            'section' => 2,
            'page' => 'Customers',
            'subPage' => $customer->user->fullName,
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        $this->authorize('update', Customer::class);

        return view('crm.administration.customers.edit', [
            'section' => 2,
            'page' => 'Customers',
            'subPage' => $customer->user->fullName,
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Customer $customer): RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ];

        if (isset($request->password)) {
            $data['password'] = $request->password;
        }

        $customer->update([
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        $user = User::where('id', $customer->user_id)->first();
        $user->update($data);

        return redirect()
            ->back()
            ->with('success', 'Customer was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $this->authorize('delete', Customer::class);

        $customer->delete();

        return redirect()
            ->route('crm.administration.customers.index')
            ->with('success', 'Customer was successfully deleted.');
    }
}
