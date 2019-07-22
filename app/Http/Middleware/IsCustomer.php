<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCustomer
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

        // ------------- middleware for Customers , only Customers can pass this middlware ----------------

        if (Auth::check()) { // ---------- if user logged in ----------

            if (auth()->user()->role_id == 1) { // ------------ if the user Customer ---------

                return $next($request);
            } else { // ------------ if not Customer ---------

                return redirect('/');
            }
        } else {

            return redirect('/login');
        }
    }
}