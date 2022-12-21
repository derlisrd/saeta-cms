<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){

        $posts = Post::where('type','post')->get();
        $config = Config::where('option','site_name')->first();
        $config2 = Config::where('option','site_description')->first();

        $site_name = $config->value;
        $site_description = $config2->value;
        return view('Public.Posts.posts',compact('posts','site_name','site_description'));
    }

    public function post(Request $r){


        $post = Post::where('slug',$r->slug)->first();
        $config = Config::where('option','site_name')->first();
        $config2 = Config::where('option','site_description')->first();

        $site_name = $config->value;
        $site_description = $config2->value;

        if($post){
            return view('Public.Posts.post',compact('post','site_name','site_description'));
        }

        return abort(404);

    }
}
