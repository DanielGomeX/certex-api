<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Models\Alternative;

class AlternativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alternative::insert([
            [
                'id' => 1,
                'alternative' => 'Conforme',
                'active' => 1,
            ],
            [
                'id' => 2,
                'alternative' => 'Não conforme',
                'active' => 1,
            ],
            [
                'id' => 3,
                'alternative' => 'N/A',
                'active' => 1,
            ]
        ]);

        DB::statement("ALTER SEQUENCE alternatives_id_seq RESTART WITH 4");
    }
}
