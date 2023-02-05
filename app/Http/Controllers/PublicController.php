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

    public function is_mobile(){
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            return true;
        }else{
            return false;
        }
    }


    public function view_post($id){

        if(Auth::user()){
            $menu = Post::where('type','nav_menu_item')->get();
            $post = Post::findOrFail($id);
            $related = [];
            if($post){
                return view('Public.Posts.post',compact('post','menu','related'));
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
            if($this->is_mobile()){
                $ad = $ad->code_mobile ?? '';
            }
            else{
                $ad= $ad->code ?? '';
            }
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
