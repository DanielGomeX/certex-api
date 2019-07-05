<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $userModel;

    public function __contruct(User $user)
    {
        $this->userModel = $user;
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

        $user = $this->userModel->where('id', $inputs['id'])->first();

        return APIHelper::response(200, ['OK'], ['user' => $user]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'name' => 'required',
            'email' => 'required',
            'companies_id' => 'required',
            'access_levels_id' => 'required',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $user = $this->userModel->create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($user) {
            return APIHelper::response(200, ['OK'], ['user' => $user]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $user = $this->userModel->find($id);

        if ($user) {
            DB::beginTransaction();
            try {
                $user->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['user' => $user]);
    }
}
