<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;




Route::get('/',[PublicController::class,'index'])->name('public.index');
Route::get('paginate/{page}',[PublicController::class,'index'])->name('public.index.paginate');

Route::get('/article/{id}',[PublicController::class,'article'])->name('public.article');
Route::get('/post/{slug}',[PublicController::class,'post'])->name('public.post');
Route::get('/page/{slug}',[PublicController::class,'post'])->name('public.page');
Route::get('/category/{slug}',[PublicController::class,'category'])->name('public.category');
Route::post('/send_comment',[PublicController::class,'send_comment'])->name('send_comment');
Route::get('/sitemap.xml',[SiteMapController::class,'index'])->name('sitemap');

Route::redirect('/login','/admin');
Route::view('/admin','Auth.login')->name('login')->middleware('guest');
Route::post('/admin',[LoginController::class,'login'])->name('login.submit')->middleware("guest");

Route::get('/view_post/{id}',[PublicController::class,'view_post'])->name('view.post');

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){


    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::group(['prefix'=>'posts'],function(){
        Route::get('/',[PostsController::class,'index'])->name('posts');
        Route::get('/trash',[PostsController::class,'trash'])->name('posts.trash');
        Route::get('/create',[PostsController::class,'create'])->name('posts.create');
        Route::get('/edit/{id}',[PostsController::class,'edit'])->name('posts.edit');
        Route::put('/edit/{id}',[PostsController::class,'update'])->name('post.update');
        Route::post('/edit/{id}',[PostsController::class,'update_ajax'])->name('post.update.ajax');
        Route::post('/store',[PostsController::class,'store'])->name('posts.store');
        Route::get('/category',[PostsController::class,'category'])->name('posts.category');
        Route::get('/category/create',[CategoryController::class,'create'])->name('posts.category.create');
        Route::post('/category/store',[CategoryController::class,'store'])->name('posts.category.store');
        Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('category.delete');
        Route::delete('/post/trash/{id}',[PostsController::class,'send_to_trash'])->name('post.send_trash');
        Route::get('/category/edit/{id}',[CategoryController::class,'category_edit'])->name('posts.category.edit');
        Route::post('/category/edit/{id}',[CategoryController::class,'category_update'])->name('posts.category.update');
        Route::get('/comments',[CommentController::class,'index'])->name('posts.comments');
        Route::post('/comments/{id}',[CommentController::class,'aproved'])->name('comment.aproved');
        Route::delete('/comment/{id}',[CommentController::class,'destroy'])->name('comment.delete');
    });

    Route::get('/users',[UsersController::class,'index'])->name('users');
    Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
    Route::post('/users',[UsersController::class,'store'])->name('users.store');

    Route::view('/media','FileManager.index')->name('filemanager.view');
    Route::group(['prefix' => 'filemanager'], function () {\UniSharp\LaravelFilemanager\Lfm::routes();});


    Route::get('/menu',[MenuController::class,'index'])->name('menu');
    Route::get('/menu/create',[MenuController::class,'create'])->name('menu.create');
    Route::post('/menu',[MenuController::class,'store'])->name('menu.store');
    Route::delete('/menu/{id}',[MenuController::class,'destroy'])->name('menu.delete');

    Route::get('/config',[ConfigController::class,'index'])->name('config');
    Route::post('/config',[ConfigController::class,'store'])->name('config.store');

    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::post('/profile/pass',[ProfileController::class,'pass'])->name('profile.save.pass');

    Route::get("logout",[LoginController::class,'logout'])->name("logout");
});



