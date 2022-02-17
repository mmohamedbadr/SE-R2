<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'note',
        'image_id',
        'is_active'
    ];
}
