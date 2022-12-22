<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function credentials(Request $request)
    {
        return [
            'email' => request()->email,
            'password' => request()->password,
            'active' => 1
        ];
    }

    public function login(Request $r)
    {
        $r->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $r->email;
        $password = $r->password;


        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            $r->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->onlyInput('email');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
