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
        Log::info('Attempting to login user', ['name' => $request->name]);

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            Log::info('Login successful', ['name' => $request->name]);

            return $this->handleUserRedirect($request, Auth::user());
        }

        Log::warning('Login failed', ['name' => $request->name]);

        return back()->with([
            'loginError' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
