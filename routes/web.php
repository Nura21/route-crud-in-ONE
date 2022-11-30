<?php
use Illuminate\Support\Facades\Route;
use App\Traits\RouteResponser;

Route::middleware('aution')->group(function(){
    foreach(RouteResponser::$mainRouteArray as $route){
        Route::resource($route.'s', RouteResponser::getRouteController($route));
    } // CRUD ROUTE

    Route::get(RouteResponser::$authRouteArray[0], [RouteResponser::$authController, RouteResponser::$authRouteArray[0]])
    ->name(RouteResponser::$authRouteArray[0]); // DASHBOARD ROUTE

    Route::post(RouteResponser::$authRouteArray[3], [RouteResponser::$authController, RouteResponser::$authRouteArray[3]])
        ->name(RouteResponser::$authRouteArray[3]); // LOGOUT ROUTE

});

Route::middleware('unauth')->group(function(){
    Route::view(RouteResponser::$authRouteArray[1], 'auth.'.RouteResponser::$authRouteArray[1])->name(RouteResponser::$authRouteArray[1]); // LOGIN ROUTE

    Route::post(RouteResponser::$authRouteArray[1], [RouteResponser::$authController, RouteResponser::$authRouteArray[1]]); // LOGIN ROUTE

    Route::get('/', function(){
        return redirect(lcfirst(__('app.buttons.login')));
    }); // SLASH ROUTE
});

Route::get('template-1', function(){
    return view('layouts.templates.template_1.index');
});