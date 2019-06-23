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

    public function index()
    {
        return APIHelper::response(200, ['OK'], ['extinguishersTypes' => $this->extinguisherTypeModel->all()]);
    }
}
