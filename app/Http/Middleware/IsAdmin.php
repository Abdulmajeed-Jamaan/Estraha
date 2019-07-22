<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

        // ------------- middleware for admins , only admins can pass this middlware ----------------

        if (Auth::check()) { // ---------- if user logged in ----------

            if (auth()->user()->role_id == 3) { // ------------ if the user Admin ---------

                return $next($request);
            } else { // ------------ if not admin ---------

                return redirect('/');
            }
        } else {

            return redirect('/login');
        }
    }
}