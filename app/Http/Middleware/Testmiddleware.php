<?php

namespace App\Http\Middleware;

use Closure;

class Testmiddleware
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
        // dd($request->param);
        if ($request->param <= 50) {

            return redirect('/');

        } else {

            return $next($request);

        }
        
    }
}
