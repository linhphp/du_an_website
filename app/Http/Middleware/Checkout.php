<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Checkout
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if (Auth::user()->jurisdiction == null) {

                return $next($request);
            }
        }

        return redirect()->route('signIn');

    }
}
