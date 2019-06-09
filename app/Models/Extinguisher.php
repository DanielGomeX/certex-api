<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extinguisher extends Model
{
    protected $table = 'extinguishers';
    protected $fillable = [
        'code',
        'numeration',
        'capacity',
        'charge',
        'charge_date',
        'validate_date',
        'location',
        'manufacturers_id',
        'extinguishers_status_id',
        'companies_id',
    ];
}
