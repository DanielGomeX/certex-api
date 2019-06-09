<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';
    protected $fillable = [
        'name',
        'fone',
        'email',
        'description',
        'cities_id'
    ];

    public function extinguishers()
    {
        return $this->hasMany(Extinguisher::class, 'manufacturers_id', 'id');
    }
}
