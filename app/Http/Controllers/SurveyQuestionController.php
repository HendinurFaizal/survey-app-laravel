<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyQuestionController extends Controller
{
    public function showCreateQuestion(Survey $id)
    {
        return view('survey/question/createQuestion', compact('id'));
    }

    public function createQuestion(Survey $id, Request $request)
    {

        // dd($request->answers);
        $validator = request()->validate([
            'question.question' => 'required | string',
            'answers.*.answer' => 'required | string',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->with('error', 'Pastikan mengisi data survey dengan benar!');
        // }

        $question = $id->questions()->create($validator['question']);
        $question->answer()->createMany($validator['answers']);

        return redirect('/survey/showSurvey' . $id->id);
        // return redirect()->route('view.survey');
    }
}
