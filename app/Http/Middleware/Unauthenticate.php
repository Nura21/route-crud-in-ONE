<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\RouteResponser;
use Illuminate\Support\Facades\Auth;

class Unauthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return $next($request);
        }

        return route(RouteResponser::$authRouteArray[0]);
    }
}
