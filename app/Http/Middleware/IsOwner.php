<?php

namespace App\Http\Middleware;

use Closure;

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

            if (auth()->user()->role_id == 3) { // ------------ if the user Admin ---------

                return redirect('/');

            } else if (auth()->user()->role_id == 2) { // ------------ if the user Owner ---------

                return $next($request);

            } elseif (auth()->user()->role_id == 1) { // ------------ if the user Customer ---------

                return redirect('/');

            }
        } else {

            return redirect('/login');

        }

    }

}
