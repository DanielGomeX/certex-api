<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::insert([
            [
                'id' => 1,
                'question' => 'Identificação',
                'active' => 1,
            ],
            [
                'id' => 2,
                'question' => 'Carga/Recarga',
                'active' => 1,
            ],
            [
                'id' => 3,
                'question' => 'Reteste',
                'active' => 1,
            ],
            [
                'id' => 4,
                'question' => 'Pintura',
                'active' => 1,
            ],
            [
                'id' => 5,
                'question' => 'Lacre',
                'active' => 1,
            ],
            [
                'id' => 6,
                'question' => 'Manômetro',
                'active' => 1,
            ],
            [
                'id' => 7,
                'question' => 'Difusor/Bico',
                'active' => 1,
            ],
            [
                'id' => 8,
                'question' => 'Mangueira',
                'active' => 1,
            ],
            [
                'id' => 9,
                'question' => 'Punho',
                'active' => 1,
            ],
            [
                'id' => 10,
                'question' => 'Recarga no mesmo estado',
                'active' => 1,
            ],
            [
                'id' => 11,
                'question' => 'Etiqueta de validade',
                'active' => 1,
            ],
            [
                'id' => 12,
                'question' => 'Alavanca/Pistola',
                'active' => 1,
            ],
            [
                'id' => 13,
                'question' => 'Anel de identificação',
                'active' => 1,
            ],
            [
                'id' => 14,
                'question' => 'Suporte no piso',
                'active' => 1,
            ],
            [
                'id' => 15,
                'question' => 'Sinalização do local',
                'active' => 1,
            ],
            [
                'id' => 16,
                'question' => 'Extintor desobistruído',
                'active' => 1,
            ],
            [
                'id' => 17,
                'question' => 'Proteção intempéries',
                'active' => 1,
            ],
            [
                'id' => 18,
                'question' => 'Fixação',
                'active' => 1,
            ],
            [
                'id' => 19,
                'question' => 'Adequado a classe do fogo',
                'active' => 1,
            ]
        ]);

        DB::statement("ALTER SEQUENCE questions_id_seq RESTART WITH 20");
    }
}
