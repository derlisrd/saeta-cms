<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostsVisita;
use Illuminate\Http\Request;

class RunnerController extends Controller
{
    public function run(){
        $posts = Post::where('type','post')->get();

        foreach($posts as $p){
            PostsVisita::create([
                'post_id'=>$p->id,
                'visitas'=>0
            ]);
        }
    }
}
