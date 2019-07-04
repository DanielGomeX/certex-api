<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtinguisherExtinguisherType extends Model
{
    public $timestamps = false;
    protected $table = 'extinguishers_has_extinguishers_types';
    protected $fillable = [
        'extinguishers_types_id',
        'extinguishers_id',
    ];
}
