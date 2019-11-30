<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class adminLogin
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
        if(Session::has('login'))
            if( Session('login')=='admin' ) 
                return $next($request);
        return redirect()->route('login');
    }
}
