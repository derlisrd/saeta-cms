<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsVisita extends Model
{
    use HasFactory;
    protected $table = 'posts_visitas';
    protected $fillable =['visitas','post_id','ip'];
}
