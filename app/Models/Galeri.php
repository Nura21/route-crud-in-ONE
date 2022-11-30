<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    public static function getGaleriCode()
    {
        return Galeri::all(['id', 'code']);
    }
}
