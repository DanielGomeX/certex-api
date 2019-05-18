<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
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
        'cities_id'
    ];
}
