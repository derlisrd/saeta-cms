<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comment = Comment::orderBy('id','desc')->get();
        return view('Posts.comments',compact('comment'));
    }

    public function aproved($id){
       $comment = Comment::find($id);
       $comment->aproved = true;
       $comment->update();
       return redirect()->route('posts.comments')->with('aprobado',true);
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.comments')->with('eliminado',true);
    }





}
