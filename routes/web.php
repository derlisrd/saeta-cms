<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use \UniSharp\LaravelFilemanager\Lfm;




Route::get('/',[PublicController::class,'index'])->name('public.index');

Route::get('/articulo/{slug}',[PublicController::class,'post'])->name('public.post');


Route::redirect('/login','/admin');
Route::view('/admin','Auth.login')->name('login')->middleware('guest');
Route::post('/admin',[LoginController::class,'login'])->name('login.submit')->middleware("guest");

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::view('home','Home.index')->name('home');

    Route::group(['prefix'=>'posts'],function(){
        Route::get('/',[PostsController::class,'index'])->name('posts');
        Route::get('/create',[PostsController::class,'create'])->name('posts.create');
        Route::post('/store',[PostsController::class,'store'])->name('posts.store');
        Route::get('/category',[PostsController::class,'category'])->name('posts.category');
        Route::get('/category/create',[CategoryController::class,'create'])->name('posts.category.create');
        Route::post('/category/store',[CategoryController::class,'store'])->name('posts.category.store');
    });


    Route::group(['prefix' => 'filemanager'], function () {
        Lfm::routes();
    });


    Route::get('/menu',[MenuController::class,'index'])->name('menu');
    Route::get('/menu/create',[MenuController::class,'create'])->name('menu.create');



    Route::get("logout",[LoginController::class,'logout'])->name("logout");
});


Route::view('testing','Test.index');
