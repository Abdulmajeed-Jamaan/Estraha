<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // ------------- middleware for Owners , only Owners can pass this middlware ----------------

        if (Auth::check()) { // ---------- if user logged in ----------
            if (auth()->user()->role_id == 2) { // ------------ if the user Owner ---------

                return $next($request);
            } else { // ------------ if not Owner ---------

                return redirect('/');
            }
        } else {

            return redirect('/login');
        }
    }
}