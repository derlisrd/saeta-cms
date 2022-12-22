<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function category(){
        $categories = Category::all();
        return view('Posts.categories',compact('categories'));
    }

    public function index()
    {

        $posts = Post::
        where('type', '=', 'post')
        ->orWhere('type','=','page')
        ->orderBy('id', 'desc')
        ->get();
        return view('Posts.index',compact('posts'));
    }

    public function edit(Request $r)
    {

        $categories = Category::all();
        $post = Post::findOrFail($r->id);
        return view('Posts.edit',compact('post','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Posts.create',['categories'=>$categories]);
    }



    public function update(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'title'=> ['required'],
            'slug'=>['required'],
            'category_id'=>['required'],
            'type'=>['required'],
            'status'=>['required'],
            'comment_status'=>['required'],
        ]);
        $slug = $request->slug ? str_replace(" ", "-", strtolower($request->slug)) : strtolower($request->slug);

        $datos = [
            'title'=> $request->title,
            'user_id'=>$user_id,
            'category_id'=>$request->category_id,
            'slug'=>preg_replace('([^A-Za-z0-9])', '-', $slug),
            'type'=>$request->type,
            'status'=>$request->status,
            'comment_status'=>$request->comment_status,
            'tags'=>$request->tags,
            'description'=>$request->description,
            'text'=>$request->text
        ];
        Post::where('id',$request->id)->update($datos);

        return redirect()->back()->with('updated',true);
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'title'=> ['required'],
            'slug'=>['required'],
            'category_id'=>['required'],
            'type'=>['required'],
            'status'=>['required'],
            'comment_status'=>['required'],
        ]);
        $slug = $request->slug ? str_replace(" ", "-", strtolower($request->slug)) : strtolower($request->slug);

        $datos = [
            'title'=> $request->title,
            'user_id'=>$user_id,
            'category_id'=>$request->category_id,
            'slug'=>preg_replace('([^A-Za-z0-9])', '-', $slug),
            'type'=>$request->type,
            'status'=>$request->status,
            'comment_status'=>$request->comment_status,
            'tags'=>$request->tags,
            'description'=>$request->description,
            'text'=>$request->text
        ];

        Post::create($datos); return redirect()->route('posts');
    }



}
