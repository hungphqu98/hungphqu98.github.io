<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Usermiddleware
{   
    private $useracc;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'useracc')
    {   
        if(Auth::guard($guard)->check()) {
          return $next($request);  
        }
        return redirect()->route('home')->with('error','Phải đăng nhập');
    }
}
