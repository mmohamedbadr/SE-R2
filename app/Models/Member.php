<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Member extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected static function booted()
    {
        static::saving(function() {
            Cache::forget('allMembers');
        });
        static::updated(function() {
            Cache::forget('allMembers');
        });
        static::deleted(function() {
            Cache::forget('allMembers');
        });
    }
}
