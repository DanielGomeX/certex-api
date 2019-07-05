<?php

use Illuminate\Database\Seeder;
use App\Models\Extinguisher;
use \Illuminate\Support\Facades\DB;

class ExtinguishersTableSeeder extends Seeder
{
    public function run()
    {
        Extinguisher::insert([
            [
                'id' => 1,
                'code' => '0001',
                'numeration' => '0001',
                'capacity' => '100',
                'charge' => '60',
                'location' => 'Center of bulding',
                'manufacturers_id' => 1,
                'companies_id' => 1,
            ]
        ]);

        DB::statement("ALTER SEQUENCE extinguishers_id_seq RESTART WITH 2");
    }
}
