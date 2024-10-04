<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
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
        if(!auth()->check()){
            return redirect()->route('login');
        }

       else if(auth()->check() AND auth()->user()->id_tipo== 1){
            return $next($request);
        }
        return redirect()->route('home');
    }

    
}
