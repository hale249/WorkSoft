<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);
        $remember = $request->input('remember_me');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard.index')->with('flash_success', __('auth.login_success'));
        }

        return redirect()->back()->withErrors([__('auth.failed')]);
    }

    public function showFormRegister()
    {
        return view('register');
    }

    /**
     * Handle register
     *
     * @param AuthRegisterRequest $request
     * @return RedirectResponse
     */
    public function register(AuthRegisterRequest $request): RedirectResponse
    {
        $data = $request->only([
            'email',
            'name',
            'password'
        ]);
        $data['password'] = Hash::make($data['password']);

        User::query()->create($data);

        return redirect()->route('auth.login')->with('flash_success', __('auth.register_success'));
    }

    /**
     * Logout
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('auth.login')->with('flash_success', __('auth.logout_success'));
    }
}
