<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class userLogin
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
            if(Session('login')=='user')
                return $next($request);
        return redirect()->route('login');
    }
}
