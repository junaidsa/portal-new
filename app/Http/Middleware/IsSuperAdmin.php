<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Assuming 'role' is a column in the users table and 'super_admin' is the role name
        if (Auth::check() && Auth::user()->role === 'super_admin') {
            return $next($request); // Proceed if the user is a super admin
        }
        // If the user is not a super admin, redirect them
        return redirect('/unauthorized')->with('error', 'You do not have access to this section.');
    }
}
