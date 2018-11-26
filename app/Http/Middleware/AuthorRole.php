<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AuthorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    const ADMIN_CP_ROLE = 2;
    const MOD_ROLE = 1;
    const MEMBER = 0;
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role < self::MOD_ROLE){
            return response()->view('error.error404');
        }
        return $next($request);
    }
}
