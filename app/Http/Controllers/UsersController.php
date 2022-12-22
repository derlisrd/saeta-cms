<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('Users.index',compact('users'));
    }

    public function create (){
        return view ('Users.create');
    }

    public function store(Request $r){

        $r->validate([
            'password'=> ['required','min:4'],
            'confirm_password'=>['required','same:password'],
            'name'=>['required','min:3','string'],
            'username'=>['required',"unique:users,username"],
            'email'=>['required',"unique:users,email",'email'],
        ]);
        $datos = [
            'name'=>$r->name,
            'username'=>$r->username,
            'email'=>$r->email,
            'password'=> Hash::make($r->password)
        ];
        User::create($datos);

        return redirect()->route('users')->with('added',true);

    }


}
