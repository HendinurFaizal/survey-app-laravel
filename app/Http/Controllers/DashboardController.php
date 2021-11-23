<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = Auth::user()->name;
            $votes = Vote::where('user_id', $userId)->get();
            $surveys = Survey::where('user_id', $userId)->get();
            return view('dashboard', compact('user', 'votes', 'surveys'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }
}
