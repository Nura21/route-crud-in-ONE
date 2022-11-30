<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangkaianAcara extends Model
{
    use HasFactory;

    public static function getRangkaianAcaraCode()
    {
        return RangkaianAcara::all(['id', 'code']);
    }
}
