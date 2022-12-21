<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
//use App\Http\Livewire\Config;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;
use \UniSharp\LaravelFilemanager\Lfm;




Route::get('/',[PublicController::class,'index'])->name('public.index');

Route::get('/post/{slug}',[PublicController::class,'post'])->name('public.post');

Route::get('/page/{slug}',[PublicController::class,'post'])->name('public.page');

Route::get('/category/{slug}',[PublicController::class,'category'])->name('public.category');



Route::redirect('/login','/admin');
Route::view('/admin','Auth.login')->name('login')->middleware('guest');
Route::post('/admin',[LoginController::class,'login'])->name('login.submit')->middleware("guest");

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::view('home','Home.index')->name('home');

    Route::group(['prefix'=>'posts'],function(){
        Route::get('/',[PostsController::class,'index'])->name('posts');
        Route::get('/create',[PostsController::class,'create'])->name('posts.create');
        Route::get('/edit/{id}',[PostsController::class,'edit'])->name('posts.edit');
        Route::post('/edit/{id}',[PostsController::class,'update'])->name('posts.update');
        Route::post('/store',[PostsController::class,'store'])->name('posts.store');
        Route::get('/category',[PostsController::class,'category'])->name('posts.category');
        Route::get('/category/create',[CategoryController::class,'create'])->name('posts.category.create');
        Route::post('/category/store',[CategoryController::class,'store'])->name('posts.category.store');
        Route::get('/category/edit/{id}',[CategoryController::class,'category_edit'])->name('posts.category.edit');
        Route::post('/category/edit/{id}',[CategoryController::class,'category_update'])->name('posts.category.update');
    });

    Route::view('/filemanager/datas','FileManager.index')->name('filemanager.view');

    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });


    Route::get('/menu',[MenuController::class,'index'])->name('menu');
    Route::get('/menu/create',[MenuController::class,'create'])->name('menu.create');
    Route::post('/menu',[MenuController::class,'store'])->name('menu.store');

    Route::get('/config',[ConfigController::class,'index'])->name('config');
    Route::post('/config',[ConfigController::class,'store'])->name('config.store');


    Route::get('/profile',[ProfileController::class,'index'])->name('profile');

    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');

    Route::post('/profile/pass',[ProfileController::class,'pass'])->name('profile.save.pass');

    Route::get("logout",[LoginController::class,'logout'])->name("logout");
});


Route::view('testing','Test.index');
