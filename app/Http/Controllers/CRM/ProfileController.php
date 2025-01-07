<?php

namespace App\Http\Controllers\CRM;

use App\Models\User;

use Illuminate\View\View;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests\CRM\Profile\UpdateRequest;
use App\Http\Requests\CRM\Profile\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('crm.profile.show', [
            'section' => 0,
            'page' => 'Profile',
            'subPage' => auth()->user()->full_name,
            'user' => auth()->user()
        ]);
    }

    public function edit(User $user): View
    {
        if (auth()->id() !== $user->id) {
            abort(404);
        }

        return view('crm.profile.edit', [
            'section' => 0,
            'page' => 'Profile',
            'subPage' => $user->full_name,
            'user' => $user
        ]);
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        if (auth()->id() !== $user->id) {
            abort(404);
        }

        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ]);

        return redirect()
            ->route('crm.profile.show')
            ->with('success', 'Profile was successfully updated.');
    }

    public function changePassword(ChangePasswordRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'password' => $request->password
        ]);

        return redirect()
            ->route('crm.profile.show')
            ->with('success', 'Password was successfully updated.');
    }
}
