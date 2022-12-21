<?php

use App\Models\Category;
use App\Models\Config;
use App\Models\Post;

function get_post_menu_url($reference,$post=null,$category=null){

    if(!$post == null){

        $sp = Post::find($post);

        return '/'.$reference .'/'. $sp->slug;
    }

    if(!$category == null){
        $sc = Category::find($category);
        return '/'.$reference .'/'. $sc->slug;
    }

    return;

}

function site_name(){
    $config = Config::where('option','site_name')->first();
    return $config->value;
}

function site_description (){
    $config2 = Config::where('option','site_description')->first();
    return $config2->value;
}

function copyright(){
    $c = Config::where('option','site_copyright')->first();
    return $c->value;
}
