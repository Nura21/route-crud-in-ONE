<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Outhentication
{
    public static function handle()
    {
        Session::flush();
        
        Auth::logout();

        return redirect(lcfirst(__('app.buttons.login')))->with([__('app.conditions.message') => 'Thankyou for using this website']);
    }
}
