<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        if ($validator->fails()) {
            return redirect('login')->with('error', 'Gunakan email yang valid dan panjang password minimal 8 karakter!');
        }

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;

        try {
            return redirect()->route('login');
        } catch (\Throwable $th) {
            return redirect('login')->with('error', 'Gagal membuat akun baru!');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        if ($validator->fails()) {
            return redirect('login')->with('error', 'Gunakan email yang valid dan panjang password minimal 8 karakter!');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error', 'Anda belum terdaftar di COBLOS!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('homepage')->with('success', 'Logout berhasil! Sampai jumpa di lain waktu👋😁👋');
    }
}
