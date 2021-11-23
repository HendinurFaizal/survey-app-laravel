<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\VoteAnswer;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function showCreateVote(Request $request)
    {
        if (Auth::check()) {
            return view('vote/createVote');
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }

    public function showResponseVote(Request $request, $id)
    {
        $vote = Vote::where('id', $id)->first();
        $title = $vote->title;
        $question = $vote->question;
        $options = VoteOption::where('vote_id', $vote->id)->get();

        return view('vote/responseVote', compact('title', 'question', 'options'));
    }

    public function createVote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | string',
            'question' => 'required | string',
            'option1' => 'required',
            'option2' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Pastikan mengisi data voting dengan benar!');
        }

        $newVote = new Vote();
        $newVote->title = $request->title;
        $newVote->user_id = $request->user()->id;
        $newVote->question = $request->question;

        try {
            $newVote->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal membuat voting!')->withInput($request->only('title', 'question'));
        }

        $newVoteOption1 = new VoteOption();
        $newVoteOption1->vote_id = $newVote->id;
        $newVoteOption1->option = $request->option1;

        $newVoteOption2 = new VoteOption();
        $newVoteOption2->vote_id = $newVote->id;
        $newVoteOption2->option = $request->option2;

        try {
            $newVoteOption1->save();
            $newVoteOption2->save();
            return redirect()->route('dashboard')->with('success', '✔️ Voting berhasil dibuat!');
        } catch (\Throwable $th) {
            $newVoteOption1->delete();
            $newVote->delete();
            return redirect()->back()->with('error', 'Gagal membuat voting!');
        }
    }

    public function responseVote(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'option' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Pastikan mengisi data voter dengan benar!');
        }

        $vote = Vote::where('id', $id)->first();
        $choice = VoteOption::where('vote_id', $vote->id)->where('option', $request->option)->first();

        $newVoteAnswer = new VoteAnswer();
        $newVoteAnswer->vote_option_id = $choice->id;
        $newVoteAnswer->email = $request->email;

        try {
            $newVoteAnswer->save();
            return redirect('vote/successVote');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal melakukan voting!');
        }
    }
}
