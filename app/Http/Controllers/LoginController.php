<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('pages.login.index');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('admin')->attempt($request->except('_token'))) {
            return redirect('dashboard');
        }else {
            return back()->with('error', 'password or username is incorrect');
        }
    }
}
