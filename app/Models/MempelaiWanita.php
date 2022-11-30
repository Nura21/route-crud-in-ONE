<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MempelaiWanita extends Model
{
    use HasFactory;
    protected $fillable = ['photo'];
    
    public static function getMempelaiWanitaCode()
    {
        return MempelaiWanita::all(['code', 'fullname']);
    }
}
