<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user()->name;
            $votes = Vote::where('user_id', Auth::user()->id)->get();
            return view('dashboard', compact('user', 'votes'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }
}
