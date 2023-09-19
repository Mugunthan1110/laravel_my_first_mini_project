<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //we have categories and its belongs to a user
    public function user(){
        return $user = $this->belongsTo(User::class);
    }

     //we have categories and its has many posts
     public function post(){
        return $post = $this->hasMany(Post::class);
    }
}
