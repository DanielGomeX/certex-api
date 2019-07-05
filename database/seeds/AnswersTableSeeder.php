<?php

use Illuminate\Database\Seeder;
use App\Models\Answer;
use \Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    public function run()
    {
        Answer::insert([
            [
                'id' => 1,
                'description' => 'Question 1 - Answered',
                'photo' => 'none',
                'active' => 1,
                'alternatives_id' => 1,
                'extinguishers_id' => 1,
                'certifications_id' => 1,
                'questions_id' => 1,
            ]
        ]);

        DB::statement("ALTER SEQUENCE answers_id_seq RESTART WITH 2");
    }
}
