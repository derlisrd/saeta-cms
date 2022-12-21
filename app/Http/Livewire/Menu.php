<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Menu extends Component
{

    public $category;
    public $type;

    public function changeType (){

        if($this->type=='category'){
            $this->category = Category::all();
        }

        if($this->type=='page'){
            $this->category = Post::all();
        }


    }



    public function render()
    {
        return view('livewire.menu');
    }
}
