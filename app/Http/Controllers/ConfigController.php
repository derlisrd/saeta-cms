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
        $sco = Config::where('option','site_cover')->first();
        $sf = Config::where('option','site_favicon')->first();
        $slogo = Config::where('option','site_logo')->first();
        $si = Config::where('option','site_intro')->first();
        $shome_post_id = Config::where('option','site_home_post_id')->first();

        $datas = [
        'site_intro' => $si->value ?? '',
        'site_favicon' => $sf->value,
        'site_cover' => $sco->value,
        'site_name' => $sn->value,
        'site_description' => $sd->value,
        'site_copyright' => $sc->value,
        'site_logo' => $slogo->value ?? '',
        'site_home_post_id' => $shome_post_id->value
        ];

        return view('Config.index',$datas);

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

        //Config::where('option', 'site_favicon')
        //->update(['value' => $r->site_favicon]);
        //Config::where('option', 'site_cover')
        //->update(['value' => $r->site_cover]);

        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_favicon'],
            ['value' => $r->site_favicon]
        );

        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_cover'],
            ['value' => $r->site_cover]
        );

        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_logo'],
            ['value' => $r->site_logo]
        );
        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_intro'],
            ['value' => $r->site_intro]
        );


        DB::table('configs')
        ->updateOrInsert(
            ['option' => 'site_home_post_id'],
            ['value' => $r->site_home_post_id]
        );

        return redirect()->route('config')->with('updated',true);
    }
}
