<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

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

    public function question()
    {
        return $this->belongsTo(Question::class, 'questions_id', 'id');
    }

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'alternatives_id', 'id');
    }
}
