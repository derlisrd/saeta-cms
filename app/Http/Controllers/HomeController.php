<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $comentarios = Comment::where('aproved',false)->count();


        return view('Home.index',compact('comentarios'));
    }
}
