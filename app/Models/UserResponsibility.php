<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserResponsibility extends Model
{
    public $timestamps = false;
    protected $table = 'users_has_responsibilities';
    protected $fillable = [
        'users_id',
        'responsibilities_id'
    ];
}
