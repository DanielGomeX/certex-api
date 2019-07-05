<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\Extinguisher;
use App\Models\Answer;
use App\Helpers\APIHelper;
use Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class CertificationsController extends Controller
{
    private $certificationModel, $extinguisherModel, $answerModel;

    public function __construct(
        Certification $certification,
        Extinguisher $extinguisher,
        Answer $answer
    ) {
        $this->certificationModel = $certification;
        $this->extinguisherModel = $extinguisher;
        $this->answerModel = $answer;
    }

    public function count()
    {
        return APIHelper::response(200, ['OK'], ['count' => $this->certificationModel->count()]);
    }

    public function all()
    {
        return APIHelper::response(200, ['OK'], ['certifications' => $this->certificationModel->all()]);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('token');

        $validator = Validator::make($inputs, [
            'users_id' => 'required',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $certification = $this->certificationModel->create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            return APIHelper::response(500, [$e->getMessage()]);
        }

        if ($certification) {
            return APIHelper::response(200, ['OK'], ['certification' => $certification]);
        }
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->except('token');

        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $validator = Validator::make($inputs, [
            'users_id' => 'required',
        ]);

        if ($validator->fails()) {
            return APIHelper::response(500, $validator->errors());
        }

        $certification = $this->certificationModel->find($id);

        if ($certification) {
            DB::beginTransaction();
            try {
                $certification->update($inputs);
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK'], ['certification' => $certification]);
    }

    public function destroy(Request $request, $id)
    {
        if (!$id) {
            return APIHelper::reponse(500, ['Not id specified']);
        }

        $certification = $this->certificationModel->load('answers')->find($id);

        if ($certification) {
            DB::beginTransaction();
            try {
                $extinguisher->answers()->delete();
                $certification->delete();
                DB::commit();
            } catch(\Exception $e) {
                DB::rollback();
                return APIHelper::response(500, [$e->getMessage()]);
            }
        }

        return APIHelper::response(200, ['OK']);
    }

    public function generate($certificationId, $extinguisherId)
    {
        $extinguisher = $this->extinguisherModel->find($extinguisherId);
        $certification = $this->certificationModel->find($certificationId);

        $answers = $this->answerModel->with(['question', 'alternative'])
                                    ->where('extinguishers_id', $extinguisherId)
                                    ->where('certifications_id', $certificationId)
                                    ->get();

        // ID do user?

        $data = [
            'answers' => $answers,
            'certification' => $certification,
            'extinguisher' => $extinguisher
        ];

        $filename = date('YmdHis').'_certification.pdf';
        $path = public_path('pdf/'.$filename);
        $pdf = PDF::loadView('certification', compact('data'));
        $pdf->save($path);
        return url('pdf/'.$filename);
    }
}
