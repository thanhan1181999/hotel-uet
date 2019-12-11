<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use URL;
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
        $old_url = URL::current();
        Session::put('old_url',$old_url);
         if(Session::has('login'))
            if(Session('login')=='user')
                return $next($request);
        return redirect()->route('login');
    }
}
