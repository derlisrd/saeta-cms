<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $ads = Ad::all();
        return view('Ads.index',compact('ads'));
    }

    public function create(){
        return view('Ads.create');
    }

    public function store(Request $r){


        $r->validate([
            'name'=> ['required'],
            'position'=>'required',
            'code'=>['required'],
            'height'=>['numeric'],
            'width'=>['numeric'],
        ]);


        $datos = [
            'name'=>$r->name,
            'position'=>$r->position,
            'code'=>$r->code,
            'height'=>$r->height,
            'width'=>$r->width,
            'movil'=>$r->movil ? true : false
        ];

        Ad::create($datos);


        return redirect()->route('ads');
    }


    public function edit($id){
        $ad = Ad::find($id);
        return view('Ads.edit',compact('ad'));
    }

    public function update(Request $r, $id){


        $r->validate([
            'name'=> ['required'],
            'position'=>'required',
            'code'=>['required'],
            'height'=>['numeric'],
            'width'=>['numeric'],
        ]);


        $datos = [
            'name'=>$r->name,
            'position'=>$r->position,
            'code'=>$r->code,
            'height'=>$r->height,
            'width'=>$r->width,
            'movil'=>$r->movil ? true : false
        ];

        Ad::where('id',$id)->update($datos);

        return redirect()->route('ads');
    }

    public function destroy($id){
        $ad = Ad::find($id);
        $ad->delete();

        return redirect()->route('ads')->with('send_trash',true);

    }

}
