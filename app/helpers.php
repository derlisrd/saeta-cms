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
function get_option(String $option_value){
    $c = Config::where('option',$option_value)->first();
    return $c->value ?? '';
}

function template_path($camino){
    $c = Config::where('option','site_template')->first();

    return 'Public.Layout.'.$c->value.'.'.$camino;
}


function public_assets($file){
    $c = Config::where('option','site_template')->first();
    return url("assets/$c->value/css/".$file);
}
