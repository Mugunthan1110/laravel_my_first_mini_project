<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // we have Post and it belongsTo a user
    public function user(){
        return $this->belongsTo (User::class);
    }

    //we have  post and it belongsTO a category

    public function category(){
        return $this->belongsTo (Category::class);
    }
}







