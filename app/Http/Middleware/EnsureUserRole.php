<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->role == 'User') {
            return $next($request);
        }
        abort(403);
        
        // if (($role == 'admin' && !Auth::user()->role == 'Admin') || ($role == 'user' && Auth::user()->role == 'User')){
            
        //     abort(403);
        // }
        // return $next($request);
     
    }
}
