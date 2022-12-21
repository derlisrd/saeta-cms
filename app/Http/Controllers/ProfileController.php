<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function index(){

        $id = Auth::id();

        $profile = User::find($id);

        return view('Profile.index',compact('id','profile'));

    }

    public function update(Request $r){

        $id = Auth::id();
        $r->validate([
            'name'=> ['required'],
            'username'=>['required',"unique:users,username,$id"],
            'email'=>['required',"unique:users,email,$id",'email'],
        ]);

        $user = User::find($id);

        $user->name = $r->name;
        $user->username = $r->username;
        $user->email = $r->email;

        $user->save();

        return redirect()->route('profile')->with('updated',true);

    }

    public function pass(Request $r){
        $id = Auth::id();
        $r->validate([
            'old_password'=> ['required','min:4'],
            'new_password'=>['required','min:4'],
            'confirm_password'=>['required','same:new_password'],
        ]);

        $current_user = Auth::user();

        if(Hash::check($r->old_password,$current_user->password)){
            $current= User::find($id);
            $current->password = Hash::make($r->new_password);
            $current->save();

            return redirect()->back()->with('updatedpass','Contraseña cambiada');
        }
        else{
            return redirect()->back()->with('error','Contraseña no válida');
        }


        $user = User::find($id);



    }


}
