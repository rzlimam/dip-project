<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        //dd(Request::url());
        return view('login.login',[
            'title' => 'Login',
            'page' => 'login'
        ]);
    }

    public function authenticate(Request $req)
    {
        $credential = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)) {
            $req->session()->regenerate();
           
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/login');

    }
}
