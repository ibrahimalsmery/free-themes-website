<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function login_page()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $ok = auth()->attempt($request->only('name', 'password'));
        if ($ok) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->withErrors(['wrong' => 'Somthing Wrong!.']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard.login.page');
    }
}
