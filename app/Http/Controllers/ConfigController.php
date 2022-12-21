<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index(){

        $sn = Config::where('option','site_name')->first();
        $sd = Config::where('option','site_description')->first();
        $sc = Config::where('option','site_copyright')->first();
        $site_name = $sn->value;
        $site_description = $sd->value;
        $site_copyright = $sc->value;
        return view('Config.index',compact('site_name','site_description','site_copyright'));

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
        Config::where('option', 'site_copyright')
        ->update(['value' => $r->site_copyright]);

        return redirect()->route('config')->with('updated',true);
    }
}
