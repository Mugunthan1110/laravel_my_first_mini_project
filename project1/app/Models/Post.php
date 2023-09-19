<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // we have post and post belongs to a user

    public function user(){
        return $user = $this->belongsTo(User::class);
    }

    // we have post and post belongs to a category

    public function category(){
        return $category = $this->belongsTo(Category::class);
    }
}
