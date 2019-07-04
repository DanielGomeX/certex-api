<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    public $timestamps = false;
    protected $table = 'access_levels';

    protected $fillable = [
        'description',
    ];
}
