<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\RouteResponser;

class Menu extends Component
{
    public $name, $icon, $routeName;

    public function __construct($name, $icon, $routeName)
    {
            if($name == 'akad-nikah' || $name == 'resepsi'){
                $icon="fa-heart";
            }
            
            if($name == 'customer' || $name == 'mempelai' || $name == 'user'){
                $icon="fa-users";
            }
            
            if($name == 'data-konten'){
                $icon="fa-folder-open";
            }
            
            if($name == 'galeri' || $name == 'konten'){
                $icon="fa-camera";
            }
            
            if($name == 'kartu-ucapan'){
                $icon="fa-envelope";
            }
            
            if($name == 'keterangan-paket'){
                $icon="fa-tags";
            }
            
            if($name == 'mempelai-pria'){
                $icon="fa-male";
            }
            
            if($name == 'mempelai-wanita'){
                $icon="fa-female";
            }
            
            if($name == 'paket'){
                $icon="fa-archive";
            }
            
            if($name == 'pemesanan'){
                $icon="fa-check";
            }
            
            if($name == 'photo'){
                $icon="fa-camera-retro";
            }
            
            if($name == 'rangkaian-acara'){
                $icon="fa-tasks";
            }
            
            if($name == 'template'){
                $icon="fa-flask";
            }

            if($name == 'transaction'){
                $icon="fa-retweet";
            }

        $this->routeName = $routeName;
        $this->name = RouteResponser::removeStripMakeStrtoupper($name, 'menu');
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.menu');
    }
}
