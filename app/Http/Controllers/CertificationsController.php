<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Helpers\APIHelper;
use Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class CertificationsController extends Controller
{
    private $certificationModel;

    public function __construct(Certification $certification)
    {
        $this->certificationModel = $certification;
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

    public function generate()
    {
        $filename = date('YmdHis').'_certification.pdf';
        $path = public_path('pdf/'.$filename);
        $pdf = PDF::loadView('certification');
        $pdf->save($path);
        return url('pdf/'.$filename);
    }
}
