<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtinguisherType extends Model
{
    protected $table = 'extinguishers_types';

    protected $fillable = [
        'description',
    ];
}
