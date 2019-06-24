<?php

namespace App\Http\Middleware;

use Closure;

class verificausuario
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
        if ($request->session()->has('SUser')) {
          return $next($request);  
        }
        return redirect('login')->with('mensaje','Necesitas iniciar sesion primero');
        
    }
}
