<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','image_id','category_id','post_id','reference','title','description','tags','slug','text','type','status','menu_order','comment_status','password'];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function images(){
        return $this->belongsTo(Images::class,'image_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'post_id');
    }

}
