<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('Posts.createcategory');
    }

    public function store (Request $r){



        $r->validate([
            'title'=> ['required'],
            'slug'=>['required'],
        ]);
        $slug = $r->slug ? str_replace(" ", "-", strtolower($r->slug)) : strtolower($r->slug);

        $datos = [
            'title'=> $r->title,
            'slug'=>preg_replace('([^A-Za-z0-9])', '-', $slug),
            'description'=>$r->description
        ];

        Category::create($datos); return redirect()->route('posts.category');
    }
}
