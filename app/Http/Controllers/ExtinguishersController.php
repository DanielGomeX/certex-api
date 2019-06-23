<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extinguisher;
use App\Models\ExtinguisherType;

class ExtinguishersController extends Controller
{
    public function index(Request $request, $skip, $take)
    {
        $inputs = $request->all();

        if ((!is_numeric($skip) and $skip < 1) or (!is_numeric($take) and $take < 1)) {
            return APIHelper::response(500, ['The parameters ini and end is a valid numeric']);
        }

        $extinguishers = Extinguisher::skip($skip)
                                        ->take($take)
                                        ->get();

        return APIHelper::response(200, ['OK'], ['extinguishers' => $extinguishers]);
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

        $extinguisher = Extinguisher::with('extinguishersTypes')
                                    ->where('id', $inputs['id'])->first();

        return APIHelper::response(200, ['OK'], ['extinguisher' => $extinguisher]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'manufacturers_id' => 'required|numeric',
            'companies_id' => 'required|numeric',
            'extinguishers_types' => 'required'
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        $extinguishersTypes = $inputs['extinguishers_types'];

        $inputs = array_diff($inputs, ['extinguishers_types']);

        DB::beginTransaction();
        try {
            $extinguisher = Extinguisher::create($inputs);

            Extinguisher::insertExtinguishersTypes($extinguisher->id, $extinguishersTypes);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($extinguisher) {
            return APIHelper::response(200, ['OK'], ['extinguisher' => $extinguisher]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $extinguisher = Extinguisher::find($id)->with('extinguishersTypes');

        $extinguishersTypes = $inputs['extinguishers_types'];

        $inputs = array_diff($inputs, ['extinguishers_types']);

        if ($extinguisher) {
            DB::beginTransaction();
            try {

                $extinguisher->extinguishersTypes()->delete();

                Extinguisher::insertExtinguishersTypes($extinguisher->id, $extinguishersTypes);

                $extinguisher->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['extinguisher' => $extinguisher]);
    }

    public function destroy(Request $request, $id)
    {
        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $extinguisher = Extinguisher::find($id)->with('extinguishersTypes');


        if ($extinguisher) {
            DB::beginTransaction();
            try {
                $extinguisher->extinguishersTypes()->delete();
                $extinguisher->delete();
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK']);
    }
}
