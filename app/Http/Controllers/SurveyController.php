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

    public function showResponseSurvey(Request $request, Survey $survei)
    {
        return view('survey/responseSurvey', compact('survei'));
    }

    public function createSurvey(Request $request)
    {
        $validator = request()->validate([
            'title' => 'required | string',
            'description' => 'string',
        ]);

        $survey = auth()->user()->survey()->create($validator);

        // return redirect('/survey/showSurvey/' . $survey->id);
        return redirect()->route('dashboard');
    }

    public function showSurvey(Survey $survei)
    {
        $survey = Survey::where('id', $survei->id)->first();
        $deskripsi = $survey->description;
        $survei->load('questions.answers.responses');
        return view('survey/showSurvey', compact('survei', 'deskripsi'));
    }

    public function showSuccessSurvey(Request $request)
    {
        return view('survey/successSurvey');
    }

    public function responseSurvey(Request $request, Survey $survei)
    {
        $validator = request()->validate([
            'responses.*.survey_answer_id' => 'required',
            'responses.*.survey_question_id' => 'required',
            'survey.email' => 'required',
        ]);

        $answers = $survei->answers()->create($validator['survey']);
        $answers->responses()->createMany($validator['responses']);

        return view('survey/successSurvey');
    }
}
