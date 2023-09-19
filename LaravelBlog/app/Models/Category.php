<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // we have category and it has many post
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
