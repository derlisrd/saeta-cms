<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{



    public function index(){
        $menu = Post::where('type','nav_menu_item')->get();
        $posts = Post::where('type','post')->where('status',1)->get();
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


    public function category (Request $r){
        $menu = Post::where('type','nav_menu_item')->get();
        $category = Category::where('slug',$r->slug)->first();



        if($category)
        {
            $posts = Post::where('type','post')->where('category_id',$category->id)->get();


            return view('Public.Posts.categories',compact('category','menu','posts'));

        }


        return abort(404);

    }


}
