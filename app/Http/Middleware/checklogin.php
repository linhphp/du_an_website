<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class checklogin
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
        if (Session::has('user')) {
            if (Session::get('user')->jurisdiction == 2) {

                return $next($request);
            }
        }
        Session::forget('user');

        return redirect()->route('login.admin');
    }
}
