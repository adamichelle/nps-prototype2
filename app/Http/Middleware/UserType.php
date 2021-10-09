<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class UserType {

  public function handle($request, Closure $next, String $user_type) {
    // if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
    //   return redirect('/home');

    $user = Auth::user();
    if($user->user_type == $user_type)
      return $next($request);

    return redirect('/home');
  }
}