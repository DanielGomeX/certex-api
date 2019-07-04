<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public $timestamps = false;
    protected $table = 'manufacturers';
    protected $fillable = [
        'name',
        'fone',
        'email',
        'description',
        'state',
        'city',
        'cep',
    ];

    public function extinguishers()
    {
        return $this->hasMany(Extinguisher::class, 'manufacturers_id', 'id');
    }
}
