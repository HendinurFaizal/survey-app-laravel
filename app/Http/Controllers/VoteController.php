<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function showCreateVote(Request $request)
    {
        return view('vote/createVote');
    }

    public function showResponseVote(Request $request)
    {
        return view('vote/responseVote');
    }

    public function createVote(Request $request)
    {
        $status = "Create vote success";
        return json_decode($status);
    }
}
