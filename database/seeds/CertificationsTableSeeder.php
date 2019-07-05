<?php

use Illuminate\Database\Seeder;
use App\Models\Certification;
use \Illuminate\Support\Facades\DB;

class CertificationsTableSeeder extends Seeder
{
    public function run()
    {
        Certification::insert([
            [
                'id' => 1,
                'report_code' => '001/2019',
                'signature' => 'Minha letra',
                'date' => '05/07/2019',
                'users_id' => 1,
            ]
        ]);

        DB::statement("ALTER SEQUENCE certifications_id_seq RESTART WITH 2");
    }
}
