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
    public function destroy($id){
        $c = Category::find($id);
        $c->delete();
        return redirect()->route('posts.category')->with('eliminado',true);
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
            'description'=>$r->description,
            'image'=>$r->image
        ];

        Category::create($datos); return redirect()->route('posts.category');
    }


    public function category_edit(Request $r){

        $category = Category::findOrFail($r->id);

        return view('Posts.editcategory',compact('category'));
    }

    public function category_update(Request $r)
    {
        $r->validate([
            'title'=> ['required'],
            'slug'=>['required'],
        ]);
        $slug = $r->slug ? str_replace(" ", "-", strtolower($r->slug)) : strtolower($r->slug);



       $c = Category::find($r->id);

        $c->title = $r->title;
        $c->description = $r->description;
        $c->slug = preg_replace('([^A-Za-z0-9])', '-', $slug);
        $c->image = $r->image;
        $c->save();

        return redirect()->route('posts.category');

    }



}
