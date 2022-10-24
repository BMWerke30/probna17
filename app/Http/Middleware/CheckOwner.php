<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\CheckOwner as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckOwner
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
        if( Auth::user()->hasRole(['admin', 'owner'])) {
            return $next($request);
        } else {
            return redirect('/admin');
        }
    }
}
