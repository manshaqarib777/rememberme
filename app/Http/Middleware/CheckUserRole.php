<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // if (auth()->check() && auth()->user()->role == "admin") {
        //     return $next($request);
        // }

        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect or return an error response
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
