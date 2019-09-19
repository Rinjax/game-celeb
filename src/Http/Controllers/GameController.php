<?php

namespace Rinjax\GameCeleb\Http\Controllers;

use App\Http\Controllers\Controller;
use Rinjax\GameCeleb\Models\Question;

class GameController extends Controller
{
    public function getQuestions()
    {
        $questions = Question::where('answered', 0)->inRandomOrder()->get();

        return response()->json($questions->toArray());
    }

    public function setQuestionAnswered($id)
    {
        Question::where('id', $id)->update(['answered' => 1]);
    }

    public function resetQuestions()
    {
        Question::where('answered', 1)->update(['answered' => 0]);
    }
}