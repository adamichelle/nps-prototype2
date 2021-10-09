<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        if (Auth::guard($guard)->check()) {
            $user_type = Auth::user()->user_type; 
            switch ($user_type) {
                case 'admin':
                    return '/admin';
                    break;
                case 'staff':
                    return '/staff';
                    break; 
                case 'instructor':
                    return '/instructor';
                    break;
                default:
                    return '/home'; 
                break;
            }
        }        

        return $next($request);
    }
}
