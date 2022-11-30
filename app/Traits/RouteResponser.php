<?php

namespace App\Traits;
use Illuminate\Support\Str;

class RouteResponser
{
    public static $authController = 'App\Http\Controllers\AuthController';

    public static $authRouteArray = [
        'dashboard', 
        'login', 
        'register', 
        'logout',
    ];
    
    public static $mainRouteArray = [
        'akad-nikah', 
        'galeri',
        'kartu-ucapan', 
        'konten', 
        'mempelai',
        'mempelai-pria', 
        'mempelai-wanita', 
        // 'musik',
        'paket',
        'photo', 
        'rangkaian-acara', 
        'resepsi', 
        'template', 
        'transaction',
        'user', 
    ];

    public static function getRouteController($route){
        if(RouteResponser::removeStripMakeStrtoupper($route) == 'Dashboard' || $route == 'dashboard'){
            return RouteResponser::$authController;
        }else{
            return 'App\Http\Controllers\\'. RouteResponser::removeStripMakeStrtoupper($route).'Controller';
        }
    }

    public static function removeStripMakeStrtoupper($route, $menu=null)
    {
        $routeNew = [];
        for($i = 0; $i<intval(Str::length($route)); $i++){
            if($route[$i-1] == '-'){
                $routeNew[] = strtoupper($route[$i]); 
            }else if($route[$i] == '-'){
                if($menu == 'menu'){
                    $routeNew[] = ' ';
                }
            }else{
                $routeNew[] = $route[$i];
            }
        }

        return ucfirst(implode($routeNew));
    }

}
