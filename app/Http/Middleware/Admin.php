<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
       $auth = Auth::guard($guard)->check() ;
        if ($auth) {

            return redirect(route('login.admin'));
        }

        return $next($request);
    }
}
