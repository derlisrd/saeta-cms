<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Images;
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
        where([
            ['type','<>','nav_menu_item'],
            ['status','<>','5'],
        ])
        ->orderBy('id', 'desc')
        ->get();
        return view('Posts.index',compact('posts'));
    }
    public function trash()
    {
        $posts = Post::
        where([
            ['type','<>','nav_menu_item'],
            ['status','=','5'],
        ])
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

        $id = $request->id;

        $request->validate([
            'title'=> ['required'],
            'slug'=>['required',"unique:post,slug,except,$id"],
            'category_id'=>['required'],
            'type'=>['required'],
            'status'=>['required'],
            'comment_status'=>['required'],
        ]);
        $slug = $request->slug ? str_replace(" ", "-", strtolower($request->slug)) : strtolower($request->slug);
        $image_id = null;
        if($request->filepath){
            $image = Images::create(['url'=>$request->filepath]);
            $image_id = $image->id;
        }
        $datos = [
            'title'=> $request->title,
            'image_id'=>$image_id,
            'bgcolor'=>$request->bgcolor,
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
            'slug'=>['required','unique:posts,slug'],
            'category_id'=>['required'],
            'type'=>['required'],
            'status'=>['required'],
            'comment_status'=>['required'],
        ]);
        $slug = $request->slug ? str_replace(" ", "-", strtolower($request->slug)) : strtolower($request->slug);

        $image_id = null;
        if($request->filepath){
            $image = Images::create(['url'=>$request->filepath]);
            $image_id = $image->id;
        }

        $datos = [
            'title'=> $request->title,
            'image_id'=>$image_id,
            'user_id'=>$user_id,
            'bgcolor'=>$request->bgcolor,
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


    public function send_to_trash($id){
        $p = Post::find($id);
        $p->status = 5;
        $p->save();
        return redirect()->back()->with('send_trash',true);
    }



}
