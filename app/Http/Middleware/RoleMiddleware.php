<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Not authenticated
            return redirect('/login');
        }

        $user = Auth::user();

        if (in_array($user->role, $roles)) {
            // User has one of the required roles
            return $next($request);
        }

        // User does not have the required role
        abort(403, 'Unauthorized action.');
    }
}

