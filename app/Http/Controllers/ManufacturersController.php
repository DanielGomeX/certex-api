<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Models\Manufacturer;
use Validator;

class ManufacturersController extends Controller
{
    public function index(Request $request, $skip, $take)
    {
        $inputs = $request->all();

        if ((!is_numeric($skip) and $skip < 1) or (!is_numeric($take) and $take < 1)) {
            return APIHelper::response(500, ['The parameters ini and end is a valid numeric']);
        }

        $manufacturers = Manufacturer::skip($skip)
                                        ->take($take)
                                        ->get();

        return APIHelper::response(200, ['OK'], ['manufacturers' => $manufacturers]);
    }

    public function show(Request $request, $id)
    {
        $inputs = $request->all();
        $inputs = ['id' => $id];

        $validator = Validator::make($inputs, [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        $manufacturer = Manufacturer::where('id', $inputs['id'])->first();

        return APIHelper::response(200, ['OK'], ['manufacturer' => $manufacturer]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'name' => 'required',
            'fone' => 'required',
            'email' => 'required|email', //Unique
            'cities_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $manufacturer = Manufacturer::create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($manufacturer) {
            return APIHelper::response(200, ['OK'], ['manufacturer' => $manufacturer]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $manufacturer = Manufacturer::find($id);

        if ($manufacturer) {
            DB::beginTransaction();
            try {
                $manufacturer->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['manufacturer' => $manufacturer]);
    }

    public function destroy(Request $request, $id)
    {
        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $manufacturer = Manufacturer::find($id);

        if ($manufacturer->extinguishers()->count() > 0) {
            return APIHelper::reponse(500, ["Manufacturer id {$id} has many extinguishers related"]);
        }

        if ($manufacturer) {
            DB::beginTransaction();
            try {
                $manufacturer->delete();
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK']);
    }
}
