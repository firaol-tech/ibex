<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lockScreen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        if(Auth::user()->isLock !=1){

            return $next($request);
        }
        else{
            return redirect(route('lockScreen'));
        }
    }else{
        return redirect(route('home'));
    }
    }
}
