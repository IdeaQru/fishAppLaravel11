<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $role
     */
    public function handle($request, \Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
