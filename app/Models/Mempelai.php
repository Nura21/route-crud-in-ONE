<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mempelai extends Model
{
    use HasFactory;

    public static function getMempelaiCode()
    {
        return Mempelai::all(['id', 'code']);
    }
}
