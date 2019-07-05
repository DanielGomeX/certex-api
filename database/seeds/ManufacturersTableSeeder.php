<?php

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
use \Illuminate\Support\Facades\DB;

class ManufacturersTableSeeder extends Seeder
{
    public function run()
    {
        Manufacturer::insert([
            [
                'id' => 1,
                'name' => 'Manufacturer One',
                'fone' => '99999999',
                'email' => 'manu@manu.com.br',
                'description' => 'AAAAA',
                'state' => 'RS',
                'city' => 'Lajeado',
                'cep' => '95900000',
            ]
        ]);

        DB::statement("ALTER SEQUENCE manufacturers_id_seq RESTART WITH 2");
    }
}
