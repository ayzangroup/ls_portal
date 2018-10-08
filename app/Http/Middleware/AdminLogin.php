<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Auth;

class AdminLogin
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
        // if(Auth::check()){
        //     return $next($request);
        // }
        // return Redirect::back()->withErrors(array('error' => 'Some issue occur' ));
        // //return $next($request);
        // //return redirect('login')->with('error','You have not admin access');
        dd(Auth::check());
       
        if(\Auth::check()) {
            return Redirect::back()->withErrors(array('error' => 'Please login for dashboard'));
        }

        return $next($request);
        
    }
}
