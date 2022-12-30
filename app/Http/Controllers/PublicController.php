<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{


    public function send_comment(Request $r){

        $r->validate([
            'email'=> ['required','email'],
            'name'=>['required'],
            'comment'=>['required'],
            'post_id'=>['required'],
        ]);


        if(!$r->control==null){
            return back()->withErrors('spam',true);
        }

        $datos = [
            'post_id'=>$r->post_id,
            'name'=>$r->name,
            'email'=>$r->email,
            'comment'=>$r->comment
        ];

        Comment::create($datos);

        return redirect()->back()->with('comentado',true);

    }

    public function index(){
        $menu = Post::where('type','nav_menu_item')->get();
        $posts = Post::where('type','post')->where('status',1)->orderBy('id','desc')->get();
        $config = Config::where('option','site_name')->first();
        $config2 = Config::where('option','site_description')->first();

        $site_name = $config->value;
        $site_description = $config2->value;
        return view('Public.Posts.posts',compact('posts','site_name','site_description','menu'));
    }

    public function post(Request $r){

        $menu = Post::where('type','nav_menu_item')->get();
        $post = Post::where('slug',$r->slug)->first();
        $config = Config::where('option','site_name')->first();
        $config2 = Config::where('option','site_description')->first();

        $site_name = $config->value;
        $site_description = $config2->value;

        if($post){
            return view('Public.Posts.post',compact('post','site_name','site_description','menu'));
        }
        return abort(404);
    }

    public function article(Request $r){

        $menu = Post::where('type','nav_menu_item')->get();
        $post = Post::findOrFail($r->id);
        $config = Config::where('option','site_name')->first();
        $config2 = Config::where('option','site_description')->first();

        $site_name = $config->value;
        $site_description = $config2->value;

        if($post){
            return view('Public.Posts.post',compact('post','site_name','site_description','menu'));
        }
        return abort(404);
    }


    public function category (Request $r){
        $menu = Post::where('type','nav_menu_item')->get();
        $category = Category::where('slug',$r->slug)->first();
        if($category)
        {
            //dd($category->posts);
            $posts = Post::where('type','post')->where('category_id',$category->id)->orderBy('id','desc')->get();
            return view('Public.Posts.categories',compact('category','menu','posts'));
        }
        return abort(404);
    }





}
