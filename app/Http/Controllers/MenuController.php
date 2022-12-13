<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MenuController extends Controller
{


    public function index(){


        $menus = Post::
        where('type', '=', 'menu')
        ->orderBy('menu_order', 'asc')
        ->get();

        return view('Menu.index',compact('menus'));
    }

    public function store(Request $r){



    }

}
