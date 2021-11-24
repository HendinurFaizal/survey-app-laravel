<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function showCreateSurvey(Request $request)
    {
        return view('survey/createSurvey');
    }

    public function showResponseSurvey(Request $request, Survey $id)
    {
        return view('survey/responseSurvey', compact('id'));
    }

    public function createSurvey(Request $request)
    {
        $validator = request()->validate([
            'title' => 'required | string',
            'description' => 'string',
        ]);

        $survey = auth()->user()->survey()->create($validator);

        return redirect('/survey/createSurvey/' . $survey->id);
    }

    public function showSurvey(Survey $id)
    {
        $id->load('questions.answers');
        return view('survey/showSurvey', compact('id'));
    }

    public function showSuccessSurvey(Request $request)
    {
        return view('survey/successSurvey');
    }

    public function responseSurvey(Request $request, Survey $id)
    {
        $validator = request()->validate([
            'responses.*.survey_answer_id' => 'required',
            'responses.*.survey_question_id' => 'required',
            'survey.email' => 'required',
        ]);

        $answers = $id->answers()->create($validator['survey']);
        $answers->responses()->createMany($validator['responses']);

        return view('survey/successSurvey');
    }
}
