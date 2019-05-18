<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    protected $table = 'access_levels';

    protected $fillable = [
        'description',
    ];
}
