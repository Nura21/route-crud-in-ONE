<?php

namespace App\Http\Middleware;

// use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Credentials
{
    public static function handle(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect(lcfirst(__('app.menus.dashboard')));
        }
        
        return redirect(lcfirst(__('app.buttons.login')))->withInput()->with([__('app.conditions.message') => 'Check your password and email again!']);
    }
}
