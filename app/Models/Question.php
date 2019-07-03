<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alternative;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question',
        'active',
    ];

    public function alternatives()
    {
        // return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
        return $this->belongsToMany(Alternative::class, 'questions_has_alternatives', 'questions_id', 'alternatives_id');
    }
}
