<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Helpers\APIHelper;
use Validator;

class CompanyController extends Controller
{
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

        $company = Company::where('id', $inputs['id'])->first();

        return APIHelper::response(200, ['OK'], ['company' => $company]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'cnpj' => 'required',
            'state_registration' => 'required',
            'cities_id' => 'required|numeric',
            'social_name' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $company = Company::create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($company) {
            return APIHelper::response(200, ['OK'], ['company' => $company]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $company = Company::find($id);

        if ($company) {
            DB::beginTransaction();
            try {
                $company->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['company' => $company]);
    }
}
