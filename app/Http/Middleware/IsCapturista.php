<?php

namespace App\Http\Middleware;

use Closure;

class IsCapturista
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

        if(\Auth::user()){

            $role = \Auth::user()->role;

            if ( $role === 'Capturista' ) {
                return $next($request);
            }
         }

         return redirect()->route('dashboard');
    }
}
