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
    public function handle($request, Closure $next)
    {
        // Check logged in user
        if(Auth::check())
        {
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }

        //return redirect('/');
        abort(403, 'Unauthorized action');

    }
}
