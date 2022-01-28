<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('gagal-login', 'Username dan password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login')->with('sukses-logout', 'Berhasil logout');
    }
}
