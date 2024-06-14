<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null              $role
     */
    public function handle($request, \Closure $next, $role = null)
    {
        \Log::info('Middleware Authenticate dipanggil');

        if (!Auth::check()) {
            \Log::info('User is not authenticated');

            return redirect()->route('login');
        }

        \Log::info('User is authenticated');

        // Check user role
        if ($role && Auth::user()->role->name !== $role) {  // Assuming the role is stored in the 'name' attribute of the Role model
            \Log::info('User does not have the required role: '.$role);

            return redirect('/')->with('error', "You don't have access to this page.");
        }

        \Log::info('User has the required role: '.$role);

        return $next($request);
    }
}
