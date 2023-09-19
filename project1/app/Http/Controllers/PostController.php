<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\facades\Auth;



class PostController extends Controller
{

    public function create(){
        $categories = Category::all();
    
        return view('post.create-post', compact('categories'));

    }

    public function store(Request $request){
      
        $request->validate(
            [
                'title'=>'required',
                'image'=>'required | image',
                'category'=>'required',
                'body'=>'required'

            ],
            );
   
        // upload image file
       $imagePath = 'storage/'. $request->file('image')->store('images', 'public'); 
       
       $user_id = Auth::user()->id;
       $title = $request->input('title');
       $category_id = $request->input('category');
       $postText = $request->input('body');
       
       $post = new Post();
       $post->user_id= $user_id;
       $post->title = $title;
       $post->category_id= $category_id;
       $post->imagePath= $imagePath;
       $post->post_text= $postText;

       $post->save();

     
       return redirect()->back()->with('status', '👍Post Created Successfully');

    }

    public function show(Request $request){
         
        $user_id = Auth::user()->id;
        
        if($request->search){
            $posts = Post::where('user_id', $user_id)->where('post_text', 'like', '%'.$request->search.'%')
            ->orWhere('user_id', $user_id)->where('title', 'like', '%'.$request->search.'%')->latest()->paginate(4);
        
        } 
        
        elseif($request->category){
            $category_id = $request->category;
            $match = ['category_id'=> $category_id, 'user_id'=> $user_id ];
            $posts = Post::where($match)->latest()->paginate(4);
        }

        else{    
        $posts = Post::where('user_id', $user_id )->latest()->paginate(4);
        }
    
        $categories = Category::latest()->get();
        
        return view('post.show-post', compact('posts', 'categories'));
        // $post = Post::where('id', $postId)->get(); // its return the result as a array
        // $post = Post::find($postId); // insteed of this    public function show(Post $postId)
        //     return view('show-post', compact('post'));
    }

    public function singlePostShow(Post $post){
        
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $relatedPosts = Post::where('user_id',  $user_id )->where('category_id', $post->category_id)->where('id', '!=', $post->id)->latest()->take(3)->get();

        }
        else{
            $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->latest()->take(3)->get();

        }
       
       // we can use this instead of above code
         // $category = $post->category;
        // $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
       
    return view('post.single-post-view', compact('post', 'relatedPosts'));
        // $post = Post::where('id', $postId)->get(); // its return the result as a array
        // $post = Post::find($postId); // insteed of this    public function show(Post $postId)
        //     return view('show-post', compact('post'));
    }
    public function edit(Post $post){
        $categories = Category::all();
     
        return view('post.edit-post', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post){
        if(auth()->User()->id !== $post->user_id){
            abort(403);
        }
        $request->validate(
            [
                
                'title'=> 'required',
                'image'=> 'required | image',
                'category'=> 'required',
                'body'=> 'required'

            ]);
           
            
         $postId = $post->id;
         $user_id = $post->user_id;
         $category_id = $request->input('category');
         $title = $request->input('title');
         $post_text = $request->input('body');

         //upload image file
         $imagePath = 'storage/'. $request->file('image')->store('postImages', 'public');

         // save to database
         $post->id = $postId;
         $post->user_id = $user_id;
         $post->category_id = $category_id;
         $post->title = $title;
         $post->imagePath = $imagePath;
         $post->post_text = $post_text;
         
         $post->save();
        return redirect()->back()->with('status', '👍Post Updated Successfully');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('status', '👍Post Deleted Successfully');
    }
}
 