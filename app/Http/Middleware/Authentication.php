<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\RouteResponser;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }

        return redirect(RouteResponser::$authRouteArray[1])->with([__('app.conditions.message') => 'You are out of authentication!']);
    }
}
