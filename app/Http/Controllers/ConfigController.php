<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index(){

        $sn = Config::where('option','site_name')->first();
        $sd = Config::where('option','site_description')->first();
        $site_name = $sn->value;
        $site_description = $sd->value;
        return view('Config.index',compact('site_name','site_description'));

    }

    public function store(Request $r){

        $r->validate([
            'site_description'=> ['required'],
            'site_name'=>['required'],
        ]);

        Config::where('option', 'site_description')
        ->update(['value' => $r->site_description]);
        Config::where('option', 'site_name')
        ->update(['value' => $r->site_name]);

        return redirect()->route('config')->with('updated',true);
    }
}
