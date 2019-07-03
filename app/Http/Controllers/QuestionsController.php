<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Helpers\APIHelper;

class QuestionsController extends Controller
{
    private $questionModel;

    public function __construct(Question $question)
    {
        $this->questionModel = $question;
    }

    public function all()
    {
        $questions = $this->questionModel->with('alternatives')->get();
        return APIHelper::response(200, ['OK'], ['questions' => $questions]);
    }
}
