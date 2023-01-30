<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{


    public function view_post($id){

        if(Auth::user()){
            $menu = Post::where('type','nav_menu_item')->get();
            $post = Post::findOrFail($id);

            if($post){
                return view('Public.Posts.post',compact('post','menu'));
            }

        }
        return abort(404);
    }


    public function send_comment(Request $r){

        $r->validate([
            'email'=> ['required','email'],
            'name'=>['required'],
            'comment'=>['required'],
            'post_id'=>['required'],
        ]);


        if(!$r->control==null){
            return back()->withErrors('spam',true);
        }

        $datos = [
            'post_id'=>$r->post_id,
            'name'=>$r->name,
            'email'=>$r->email,
            'comment'=>$r->comment
        ];

        Comment::create($datos);

        return redirect()->back()->with('comentado',true);

    }




    public function index(Request $r){

        $intro = get_option('site_intro');
        $menu = Post::where('type','nav_menu_item')->get();

        if($intro == 'posts')
        {
            $limit = 12;
            $currentPage = $r->page ?? 1;
            $page = $r->page ? (($r->page-1) * $limit) : 0;
            $ad = Ad::inRandomOrder()->where('position',3)->first();
            $posts = Post::where('type','post')
            ->where('status',1)
            ->offset($page)
            ->limit($limit)
            ->orderBy('id','desc')
            ->get();

            $count = Post::where('type','post')->where('status',1)->count();
            $pages = round( $count / $limit);
            if($posts->count()>0){
                $nextPage = $currentPage<$pages ? $currentPage + 1 : null;
                $prevPage = ($currentPage - 1)>0 ? $currentPage - 1 : null;
                return view('Public.Posts.posts',compact('posts','menu','nextPage','prevPage','ad'));
            }
            else{
                return abort(404);
            }
        }

        if($intro == 'post'){
            $post_id = get_option('site_home_post_id');
            $post = Post::findOrFail($post_id);


            if($post){
                return view('Public.Posts.post',compact('post','menu'));
            }
            return abort(404);
        }

    }





    public function post(Request $r){

        $menu = Post::where('type','nav_menu_item')->get();
        $post = Post::where('slug',$r->slug)->first();

        $ad = Ad::where('position',1)->first();

        if($post){

            $related = Post::where('type','post')
            ->where('status',1)
            ->where('category_id',$post->category_id)
            ->where([['id','<>',$post->id]])
            ->limit(3)
            ->get();



            return view('Public.Posts.post',compact('post','menu','ad','related'));
        }
        return abort(404);
    }





    public function article(Request $r){

        $menu = Post::where('type','nav_menu_item')->get();
        $post = Post::findOrFail($r->id);

        if($post){
            return view('Public.Posts.post',compact('post','menu'));
        }
        return abort(404);
    }


    public function category (Request $r){
        $menu = Post::where('type','nav_menu_item')->get();
        $category = Category::where('slug',$r->slug)->first();
        if($category)
        {
            //dd($category->posts);
            $posts = Post::where('type','post')->where([
                ['category_id','=',$category->id],
                ['status','=',1],
                ])->orderBy('id','desc')->get();
            return view('Public.Posts.categories',compact('category','menu','posts'));
        }
        return abort(404);
    }





}
