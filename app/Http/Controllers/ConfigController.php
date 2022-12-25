<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{

    public function index(){

        $sn = Config::where('option','site_name')->first();
        $sd = Config::where('option','site_description')->first();
        $sc = Config::where('option','site_copyright')->first();
        $sc = Config::where('option','site_cover')->first();
        $sf = Config::where('option','site_favicon')->first();
        $site_favicon = $sf->value;
        $site_cover = $sc->value;
        $site_name = $sn->value;
        $site_description = $sd->value;
        $site_copyright = $sc->value;
        return view('Config.index',compact('site_name','site_description','site_copyright','site_favicon','site_cover'));

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
        /* Config::where('option', 'site_favicon')
        ->update(['value' => $r->site_favicon]);
        Config::where('option', 'site_cover')
        ->update(['value' => $r->site_cover]); */

        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_cover'],
            ['value' => $r->site_favicon]
        );

        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_cover'],
            ['value' => $r->site_cover]
        );



        return redirect()->route('config')->with('updated',true);
    }
}
