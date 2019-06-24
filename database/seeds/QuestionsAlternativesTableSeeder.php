<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Models\QuestionAlternative;

class QuestionsAlternativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionAlternative::insert([
            [
                'id' => 1,
                'questions_id' => 1,
                'alternatives_id' => 1,
            ],
            [
                'id' => 2,
                'questions_id' => 1,
                'alternatives_id' => 2,
            ],
            [
                'id' => 3,
                'questions_id' => 1,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 4,
                'questions_id' => 2,
                'alternatives_id' => 1,
            ],
            [
                'id' => 5,
                'questions_id' => 2,
                'alternatives_id' => 2,
            ],
            [
                'id' => 6,
                'questions_id' => 2,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 7,
                'questions_id' => 3,
                'alternatives_id' => 1,
            ],
            [
                'id' => 8,
                'questions_id' => 3,
                'alternatives_id' => 2,
            ],
            [
                'id' => 9,
                'questions_id' => 3,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 10,
                'questions_id' => 4,
                'alternatives_id' => 1,
            ],
            [
                'id' => 11,
                'questions_id' => 4,
                'alternatives_id' => 2,
            ],
            [
                'id' => 12,
                'questions_id' => 4,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 13,
                'questions_id' => 5,
                'alternatives_id' => 1,
            ],
            [
                'id' => 14,
                'questions_id' => 5,
                'alternatives_id' => 2,
            ],
            [
                'id' => 15,
                'questions_id' => 5,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 16,
                'questions_id' => 6,
                'alternatives_id' => 1,
            ],
            [
                'id' => 17,
                'questions_id' => 6,
                'alternatives_id' => 2,
            ],
            [
                'id' => 18,
                'questions_id' => 6,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 19,
                'questions_id' => 7,
                'alternatives_id' => 1,
            ],
            [
                'id' => 20,
                'questions_id' => 7,
                'alternatives_id' => 2,
            ],
            [
                'id' => 21,
                'questions_id' => 7,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 22,
                'questions_id' => 8,
                'alternatives_id' => 1,
            ],
            [
                'id' => 23,
                'questions_id' => 8,
                'alternatives_id' => 2,
            ],
            [
                'id' => 24,
                'questions_id' => 8,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 25,
                'questions_id' => 9,
                'alternatives_id' => 1,
            ],
            [
                'id' => 26,
                'questions_id' => 9,
                'alternatives_id' => 2,
            ],
            [
                'id' => 27,
                'questions_id' => 9,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 28,
                'questions_id' => 10,
                'alternatives_id' => 1,
            ],
            [
                'id' => 29,
                'questions_id' => 10,
                'alternatives_id' => 2,
            ],
            [
                'id' => 30,
                'questions_id' => 10,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 31,
                'questions_id' => 11,
                'alternatives_id' => 1,
            ],
            [
                'id' => 32,
                'questions_id' => 11,
                'alternatives_id' => 2,
            ],
            [
                'id' => 33,
                'questions_id' => 11,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 34,
                'questions_id' => 12,
                'alternatives_id' => 1,
            ],
            [
                'id' => 35,
                'questions_id' => 12,
                'alternatives_id' => 2,
            ],
            [
                'id' => 36,
                'questions_id' => 12,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 37,
                'questions_id' => 13,
                'alternatives_id' => 1,
            ],
            [
                'id' => 38,
                'questions_id' => 13,
                'alternatives_id' => 2,
            ],
            [
                'id' => 39,
                'questions_id' => 13,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 40,
                'questions_id' => 14,
                'alternatives_id' => 1,
            ],
            [
                'id' => 41,
                'questions_id' => 14,
                'alternatives_id' => 2,
            ],
            [
                'id' => 42,
                'questions_id' => 14,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 43,
                'questions_id' => 15,
                'alternatives_id' => 1,
            ],
            [
                'id' => 44,
                'questions_id' => 15,
                'alternatives_id' => 2,
            ],
            [
                'id' => 45,
                'questions_id' => 15,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 46,
                'questions_id' => 16,
                'alternatives_id' => 1,
            ],
            [
                'id' => 47,
                'questions_id' => 16,
                'alternatives_id' => 2,
            ],
            [
                'id' => 48,
                'questions_id' => 16,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 49,
                'questions_id' => 17,
                'alternatives_id' => 1,
            ],
            [
                'id' => 50,
                'questions_id' => 17,
                'alternatives_id' => 2,
            ],
            [
                'id' => 51,
                'questions_id' => 17,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 52,
                'questions_id' => 18,
                'alternatives_id' => 1,
            ],
            [
                'id' => 53,
                'questions_id' => 18,
                'alternatives_id' => 2,
            ],
            [
                'id' => 54,
                'questions_id' => 18,
                'alternatives_id' => 3,
            ],
        ]);

        QuestionAlternative::insert([
            [
                'id' => 55,
                'questions_id' => 19,
                'alternatives_id' => 1,
            ],
            [
                'id' => 56,
                'questions_id' => 19,
                'alternatives_id' => 2,
            ],
            [
                'id' => 57,
                'questions_id' => 19,
                'alternatives_id' => 3,
            ],
        ]);

        DB::statement("ALTER SEQUENCE questions_has_alternatives_id_seq RESTART WITH 20");
    }
}
