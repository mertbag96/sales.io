<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\User;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function doLogin(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id < 1) {
                Auth::logout();
                return back()->withErrors([
                    'email' => __('auth.incorrect_credentials')
                ]);
            }

            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'email' => __('auth.incorrect_credentials')
            ]);
        }
    }

    public function doRegister(RegisterRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return redirect()
            ->back()
            ->with('success', __('auth.register_success'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
