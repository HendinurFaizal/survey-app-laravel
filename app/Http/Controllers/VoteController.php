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

    public function showVote(Request $request, Vote $vote)
    {
        // $vote = Vote::where('id', $id)->first();
        $options = VoteOption::where('vote_id', $vote->id)->get();
        $option1 = VoteAnswer::where('vote_option_id', $options[0]->id)->count();
        $option2 = VoteAnswer::where('vote_option_id', $options[1]->id)->count();
        return view('vote/showVote', compact('vote', 'options', 'option1', 'option2'));
    }

    public function showResponseVote(Request $request, Vote $vote)
    {
        // $vote = Vote::where('id', $id)->first();
        // $title = $vote->title;
        // $question = $vote->question;
        $options = VoteOption::where('vote_id', $vote->id)->get();

        // return view('vote/responseVote', compact('title', 'question', 'options', 'vote'));

        return view('vote/responseVote', compact('vote', 'options'));
    }

    public function showSuccessVote(Request $request)
    {
        return view('vote/successVote');
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

    public function responseVote(Request $request, Vote $vote)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'option' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silakan isi voting dengan lengkap!');
        }

        $votey = Vote::where('id', $vote->id)->first();
        $choice = VoteOption::where('vote_id', $votey->id)->where('option', $request->option)->first();

        $newVoteAnswer = new VoteAnswer();
        $newVoteAnswer->vote_option_id = $choice->id;
        $newVoteAnswer->email = $request->email;

        try {
            $newVoteAnswer->save();
            return view('vote/successVote');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal melakukan voting!');
        }
    }
    public function destroy(Vote $vote)
    {
        $vote->delete();
        return redirect('dashboard')->with('success', 'Vote berhasil dihapus!');
    }
}
