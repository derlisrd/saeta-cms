<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $email = $r->email;
        $password = $r->password;
        $remember = $r->remember;

        $intento = filter_var($email, FILTER_VALIDATE_EMAIL) ?
        ['email' => $email, 'password' => $password, 'active' => 1] :
        ['username' => $email, 'password' => $password, 'active' => 1];

        if (Auth::attempt($intento,$remember)) {
            $r->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route("login");
    }

}
