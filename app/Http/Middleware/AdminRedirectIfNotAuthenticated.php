<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

//use Auth;
class AdminRedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        
        $auth = Auth::guard($guard);
        if (!$auth->check()) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
