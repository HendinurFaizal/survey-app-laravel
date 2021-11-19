<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function showRegister(Request $request)
    {
        return view('auth/register');
    }

    public function showLogin(Request $request)
    {
        return view('auth/login');
    }
}
