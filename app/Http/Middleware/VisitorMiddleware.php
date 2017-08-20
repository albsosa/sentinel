<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorMiddleware
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
        //Si el usuario no esta logueado...
        if(!Sentinel::check())
        return $next($request);
        else
            return redirect('/');
    }
}
 