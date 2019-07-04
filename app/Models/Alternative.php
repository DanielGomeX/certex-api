<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    public $timestamps = false;
    protected $table = 'alternatives';
    protected $fillable = [
        'alternative',
        'active',
    ];
}
