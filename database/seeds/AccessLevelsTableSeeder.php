<?php

use Illuminate\Database\Seeder;
use App\Models\AccessLevel;
use \Illuminate\Support\Facades\DB;

class AccessLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessLevel::insert([
            [
                'id' => 1,
                'description' => 'root'
            ]
        ]);

        DB::statement("ALTER SEQUENCE access_levels_id_seq RESTART WITH 2");
    }
}
