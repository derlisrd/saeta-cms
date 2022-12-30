<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Configpost extends Component
{

    public $site_intro;

    public $posts = null;

    public $site_home_post_id = null;


    public function __construct()
    {
        $this->site_intro = get_option('site_intro');
        $this->site_home_post_id  = get_option('site_home_post_id ');

        if($this->site_intro){
            $this->posts = Post::where('type','post')
            ->orWhere('type','page')
            ->get();
        }
    }


    public function traer_datos(){

        if($this->site_intro=='post'){
            $this->posts = Post::where('type','post')
            ->orWhere('type','page')
            ->get();
        }
        else{
            $this->posts = null;
        }


    }


    public function render()
    {
        return view('livewire.configpost');
    }
}
