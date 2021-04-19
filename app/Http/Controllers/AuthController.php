<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        session([ 'previous_url' => url()->previous() ]);
        if (Auth::check()) {
            return Redirect::route('dashboard.index');
        }
        return view('auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $userData = $request->only([ 'email', 'password' ]);
        $remember = $request->boolean('remember');

        if (Auth::attempt($userData, $remember)) {
            $previousUrl = session('previous_url');
            if (empty($previousUrl) || strpos($previousUrl, '/login') !== false) {
                $previousUrl = '/';
            }

            return redirect($previousUrl);
        }

        return Redirect::to('login')
            ->withInput($request->except('password'))
            ->with('error', 'Email/password mismatch, please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with('flash_success', __('auth.logout_success'));
    }
}
