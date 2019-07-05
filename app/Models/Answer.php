<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    protected $table = 'answers';
    protected $fillable = [
        'description',
        'photo',
        'active',
        'alternatives_id',
        'extinguishers_id',
        'certifications_id',
        'questions_id',
    ];
}
