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


    public function edit(){

    }

    public function update(Request $r, $id){

    }

    public function destroy($id){

    }

}
