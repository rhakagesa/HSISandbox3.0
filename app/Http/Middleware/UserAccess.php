<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if(Auth::check() && in_array(Auth::User()->role, $role)){
            return $next($request);
        }

        if (Auth::check()){
            return redirect('/'.Auth::User()->role.'/home');
        }
        else {
            return redirect('/');
        }
    }
}
