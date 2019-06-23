<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExtinguishersTypes;

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

    public function extinguishersTypes()
    {
        return $this->belongsToMany(ExtinguishersTypes::class, 'extinguishers_has_extinguishers_types', 'extinguishers_id', 'extinguishers_types_id');
    }

    public function insertExtinguishersTypes($extinguisherId, $extinguishersTypes)
    {
        if (count($extinguishersTypes) > 0) {
            foreach($extinguishersTypes as $extinguisherTypeId) {
                ExtinguisherType::create([
                    'extinguishers_id' => $extinguisherId,
                    'extinguishers_types_id' => $extinguisherTypeId,
                ]);
            }
        }
    }

}
