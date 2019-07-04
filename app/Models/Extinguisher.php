<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExtinguisherType;
use App\Models\ExtinguisherExtinguisherType;

class Extinguisher extends Model
{
    protected $table = 'extinguishers';
    protected $fillable = [
        'code',
        'numeration',
        'capacity',
        'charge',
        'location',
        'manufacturers_id',
        'extinguishers_status_id',
        'companies_id',
    ];

    public function extinguishersExtinguishersTypes()
    {
        return $this->hasMany(ExtinguisherExtinguisherType::class, 'extinguishers_id', 'id');
    }

    public static function insertExtinguishersTypes($extinguisherId, $extinguishersTypes)
    {
        if (count($extinguishersTypes) > 0) {
            foreach($extinguishersTypes as $extinguisherTypeId) {
                ExtinguisherExtinguisherType::create([
                    'extinguishers_id' => $extinguisherId,
                    'extinguishers_types_id' => $extinguisherTypeId,
                ]);
            }
        }
    }

}
