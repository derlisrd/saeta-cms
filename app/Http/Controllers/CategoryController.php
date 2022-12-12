<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('Posts.createcategory');
    }
}
