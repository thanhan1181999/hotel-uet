<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleWare
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
        if(session()->has('account')){
            $account=session()->get('account');
            if($account->role==1)
                return $next($request);
            session()->put('notice','Admin không được book phòng');
            session()->put('levelNotice','danger');
        }
        return redirect('home');
    }
}
