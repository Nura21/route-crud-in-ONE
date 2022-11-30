<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Middleware\Credentials;
use App\Http\Middleware\Outhentication;
use App\Traits\RouteResponser;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return Credentials::handle($request);
    }

    public function dashboard()
    {
        return view(lcfirst(__('app.menus.dashboard')))
            ->with(['lists' => $this->listsDatas(), 'routes' => RouteResponser::$mainRouteArray]);
    }

    public function listsDatas()
    {
        $lists = [];
        foreach(RouteResponser::$mainRouteArray as $route){
            if($route == 'user' || $route == 'customer' || $route == 'mempelais'){
                $lists[$route.'s'] = count(strval('App\Models\\'.ucfirst($route))::all());
            }
        }

        return $lists;
    }

    public function logout()
    {
        return Outhentication::handle();
    }
}
