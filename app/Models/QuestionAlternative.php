<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAlternative extends Model
{
    public $timestamps = false;
    protected $table = 'questions_has_alternatives';
    protected $fillable = [
        'questions_id',
        'alternatives_id',
    ];
}
