<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Helpers\APIHelper;
use Validator;

class AnswersController extends Controller
{
    private $answerModel;

    public function __construct(Answer $answer)
    {
        $this->answerModel = $answer;
    }

    public function all()
    {
        return APIHelper::response(200, ['OK'], ['answers' => $this->answerModel->all()]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'alternatives_id' => 'required',
            'extinguishers_id' => 'required',
            'certifications_id' => 'required',
            'questions_id' => 'required',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $answer = $this->answerModel->create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($answer) {
            return APIHelper::response(200, ['OK'], ['answer' => $answer]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $validator = Validator::make($inputs, [
            'alternatives_id' => 'required',
            'extinguishers_id' => 'required',
            'certifications_id' => 'required',
            'questions_id' => 'required',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        $answer = $this->answerModel->find($id);

        if ($answer) {
            DB::beginTransaction();
            try {
                $answer->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['answer' => $answer]);
    }

    public function destroy(Request $request, $id)
    {
        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $answer = $this->answerModel->find($id);

        if ($answer) {
            DB::beginTransaction();
            try {
                $answer->delete();
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK']);
    }
}
