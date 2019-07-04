<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtinguisherType extends Model
{
    public $timestamps = false;
    protected $table = 'extinguishers_types';
    protected $fillable = [
        'description',
    ];
}
