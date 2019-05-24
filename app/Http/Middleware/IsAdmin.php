<?php

namespace App\Http\Middleware;

use Closure;

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

            } else if (auth()->user()->role_id == 2) { // ------------ if the user Owner ---------

                return redirect('/');

            } elseif (auth()->user()->role_id == 1) { // ------------ if the user Customer ---------

                return redirect('/');

            }
        } else {

            return redirect('/login');

        }

    }
}
