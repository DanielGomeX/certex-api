<?php

use Illuminate\Database\Seeder;
use App\Models\ExtinguisherType;

class ExtinguishersTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExtinguisherType::insert([
            [
                'id' => 1,
                'description' => 'Classe A'
            ],
            [
                'id' => 2,
                'description' => 'Classe B'
            ],
            [
                'id' => 3,
                'description' => 'Classe C'
            ],
            [
                'id' => 4,
                'description' => 'Classe D'
            ],
            [
                'id' => 5,
                'description' => 'Classe K'
            ],
            [
                'id' => 6,
                'description' => 'Extintor com carga de água'
            ],
            [
                'id' => 7,
                'description' => 'Extintor com carga de espuma mecânica'
            ],
            [
                'id' => 8,
                'description' => 'Extintor com carga de dióxido de carbono'
            ],
            [
                'id' => 9,
                'description' => 'Extintor com carga de pó químico BC'
            ],
            [
                'id' => 10,
                'description' => 'Extintor com carga de pó químico ABC'
            ],
            [
                'id' => 11,
                'description' => 'Extintor com carga de halogenados'
            ],
        ]);

        DB::statement("ALTER SEQUENCE extinguishers_types_id_seq RESTART WITH 12");
    }
}
