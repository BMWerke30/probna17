<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\CheckAdmin as Middleware;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if( Auth::user()->hasRole(['admin']) )
        return $next($request);
        else
        return redirect('/admin');
    }
}
