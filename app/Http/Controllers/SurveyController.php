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

    public function showResponseSurvey(Request $request)
    {
        return view('survey/responseSurvey');
    }

    public function createSurvey(Request $request)
    {
        $validator = request()->validate([
            'title' => 'required | string',
            'description' => 'string',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->with('error', 'Pastikan mengisi data survey dengan benar!');
        // }

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
}
