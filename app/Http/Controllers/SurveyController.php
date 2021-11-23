<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $status = "Create survey success";
        return json_decode($status);
    }

    public function showSuccessSurvey(Request $request)
    {
        return view('survey/successSurvey');
    }
}
