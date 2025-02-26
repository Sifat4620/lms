<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the authenticated user has the given role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // If the user does not have the correct role, redirect to unauthorized page
        return redirect()->route('unauthorized');
    }
}
