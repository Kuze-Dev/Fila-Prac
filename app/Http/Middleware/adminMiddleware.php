<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use BezhanSalleh\FilamentShield\FilamentShield;
use Symfony\Component\HttpFoundation\Response;
use BezhanSalleh\FilamentShield\Facades\FilamentShield;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the currently authenticated user and load only the role names
        $user = Auth::user()->load('roles:name');

        // Retrieve the role names and check if 'super-admin' is exactly one of the roles
        $roleNames = $user->roles->pluck('name');

        // Debugging: log the roles to ensure you're getting the right data
        \Log::info('User Roles: ', $roleNames->toArray());

        // Check if the user has the 'super-admin' role
        if ($roleNames->contains('super-admin')) {
            return $next($request);// Allow the user to access the admin panel
        }
        if ($roleNames->contains('panel_user')) {
            return redirect('/user');
        }

        // Redirect the user if they don't have the 'super-admin' role
        return $next($request);
    }

    }



