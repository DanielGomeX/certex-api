<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $table = 'companies';
    protected $fillable = [
        'cnpj',
        'state_registration',
        'social_name',
        'fantasy_name',
        'address',
        'cep',
        'complement',
        'neighborhood',
        'signature',
        'state',
        'city',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'companies_id', 'id');
    }
}
