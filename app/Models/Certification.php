<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    public $timestamps = false;
    protected $table = 'certifications';
    protected $fillable = [
        'report_code',
        'signature',
        'users_id',
    ];
}
