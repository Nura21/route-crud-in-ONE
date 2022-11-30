<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MempelaiPria extends Model
{
    use HasFactory;
    protected $fillable = ['photo'];

    public static function getMempelaiPriaCode()
    {
        return MempelaiPria::all(['code', 'fullname']);
    }
}
