<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $table = 'cities';
    protected $fillable = [
        'name',
        'states_id',
    ];
}
