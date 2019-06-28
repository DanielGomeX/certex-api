<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Models\ExtinguisherType;

class ExtinguishersTypesController extends Controller
{
    private $extinguisherTypeModel;

    public function __construct(ExtinguisherType $extinguisherType)
    {
        $this->extinguisherTypeModel = $extinguisherType;
    }

    public function all()
    {
        return APIHelper::response(200, ['OK'], ['extinguishersTypes' => $this->extinguisherTypeModel->all()]);
    }

    public function count()
    {
        return APIHelper::response(200, ['OK'], ['count' => $this->extinguisherTypeModel->count()]);
    }
}
