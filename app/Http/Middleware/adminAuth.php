<?php

namespace App\Http\Middleware;

use Closure;

class adminAuth
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
        if (($request->user() && ($request->user()->name != 'admin' || $request->user()->email != 'admin@admin.com')))
        {
            return abort('401');
        }
        elseif(!$request->user()){
            return redirect('login');
        }
        return $next($request);
    }
}
