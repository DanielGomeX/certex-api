<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Models\ExtinguisherType;

class ExtinguishersTypesController extends Controller
{
    public function index()
    {
        return APIHelper::response(200, ['OK'], ['extinguishersTypes' => ExtinguisherType::all()]);
    }
}
