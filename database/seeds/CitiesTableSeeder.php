<?php

use Illuminate\Database\Seeder;
use App\Models\City;
use \Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        City::insert([
            [
                'id' => 1,
                'name' => 'Lajeado',
                'states_id' => 21,
            ]
        ]);

        DB::statement("ALTER SEQUENCE cities_id_seq RESTART WITH 2");
    }
}
