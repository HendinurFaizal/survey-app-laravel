<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user()->name;
            return view('dashboard', compact('user'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }
}
