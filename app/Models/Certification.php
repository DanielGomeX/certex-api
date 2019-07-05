<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answers;

class Certification extends Model
{
    public $timestamps = false;
    protected $table = 'certifications';
    protected $fillable = [
        'report_code',
        'signature',
        'users_id',
    ];

    public function answers()
    {
        return $this->hasMany(Answers::class, 'certifications_id', 'id');
    }
}
