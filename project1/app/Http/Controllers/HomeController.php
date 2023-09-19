<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        
        if($request->search){
            
            $posts = Post::where('title', 'like', '%'.$request->search.'%')
            ->orWhere('post_text', 'like', '%'.$request->search.'%')->latest()->paginate(4)->withQueryString();

        }
        elseif ($request->category){
            $posts = Post::where('category_id', request('category'))->latest()->paginate(4)->withQueryString();
           
        }
        else{
            $posts = Post::latest()->paginate(4);
          
        }

        $categories = Category::all();
        return view ('index', compact('posts', 'categories'));
        
        // $posts = Post::all();        //select * from creat_posts_table
        // $posts = Post::orderBy('id', 'desc')->get(); //select * from creat_posts_table  -- latest posts will show first
        // $posts = Post::latest()->get(); //select * from creat_posts_table  -- latest posts will show first
        // $posts = Post::where('category_id', request('category_id'))->latest()->get();
         
        // $posts = Post::when(request(key:'category_id'), function($query){
        //     $query->where('category_id', request(key:'category_id'));})
        //     ->latest()->get();
        
        // insteed of above  code
        
      
        // $allCategories = DB::table(table:'categories')->get();
        // $allCategories = Category::all();
        // return view ('index', compact('allCategories','posts'));

        // $allCategories = ['category 1', 'category 2', 'category 3'];
        // return view ('index', ['categories' => $allCategories]);
    }
}
