<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;





Route::view('/','Public.index');


Route::redirect('/login','/admin');
Route::view('/admin','Auth.login')->name('login')->middleware('guest');
Route::post('/admin',[LoginController::class,'login'])->name('login.submit')->middleware("guest");

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::view('home','Home.index')->name('home');

    Route::get('posts',[PostsController::class,'index'])->name('posts');
    Route::get('posts/create',[PostsController::class,'create'])->name('posts.create');
    Route::post('posts/store',[PostsController::class,'store'])->name('posts.store');

    Route::get('posts/category',[PostsController::class,'category'])->name('posts.category');

    Route::get("logout",[LoginController::class,'logout'])->name("logout");
});

