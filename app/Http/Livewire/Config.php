<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Config extends Component
{

    public $site_name="hola quetal";

    public $site_description = "";


    public function render()
    {
        return view('livewire.config');
    }
}
