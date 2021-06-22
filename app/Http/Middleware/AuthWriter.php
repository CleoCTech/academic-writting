<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthWriter
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
        if ( ! session()->has('AuthWriter') && $request->path() != 'writer/login') {
            return redirect('writer/login')->with("Fail", "You Must Be Logged In");
        }
        if ( session()->has('AuthWriter') && $request->path() == 'writer/login') {
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
