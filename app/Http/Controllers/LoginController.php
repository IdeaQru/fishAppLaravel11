<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function authenticated(Request $request)
    {
        Log::info('Attempting to login user', ['email' => $request->email]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            Log::info('Login successful', ['email' => $request->email]);

            return $this->handleUserRedirect($request, Auth::user());
        }

        Log::warning('Login failed', ['email' => $request->email]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function index()
    {
        return view('auth.login'); // Pastikan view ini ada di resources/views/auth/login.blade.php
    }

    /**
     * Handle an authentication attempt.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Redirect the user based on their role.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleUserRedirect(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->intended('mapuser');
        }
    }
}
