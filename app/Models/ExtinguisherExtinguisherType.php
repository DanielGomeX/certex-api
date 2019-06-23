<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtinguisherExtinguisherType extends Model
{
    protected $table = 'extinguishers_has_extinguishers_types';
    protected $fillable = [
        'extinguishers_types_id',
        'extinguishers_id',
    ];
}
