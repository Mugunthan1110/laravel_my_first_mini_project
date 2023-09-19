<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request){
   
        if($request->search){
    
            $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
        }
        elseif($request->category){
            // $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(4)->withQueryString();
            $posts = Post::where('category_id', $request->category)->latest()->paginate(4)->withQueryString();
            
        }
        else{
            $posts = Post::latest()->paginate(4);
        }
        $categories = Category::all();
        return view('blogPosts.blog', compact('posts', 'categories'));
    }
    
    
    public function create(){
        $categories = Category::all();
        return view('blogPosts.create_blog_post', compact('categories'));
    }

    public function store(Request $request){
        // $inputall = $request->all();         // its post all inputs from that forms
                                            // $title = $request->input('title'); -- only post title
            $request->validate(
            [
                
                'title'=> 'required',
                'image'=> 'required | image',
                'category'=> 'required',
                'body'=> 'required'

            ]);

            if(Post::latest()->first()!== null)
            {
           $postId = Post::latest()->first()->id+1;
                
            }
            else{
                $postId = 1;
            }

           $title = $request->input('title');
           $slug = Str::slug($title, '-') .'-' . $postId; // '-' -- mean if title is titleone == title-one
           $user_id = Auth::user()->id;
           $category_id = $request->input('category');
           $body = $request->input('body');
            
           //file upload
             // Create a directory if it doesn't exist
        $directory = 'postImages';
        if (!Storage::exists($directory)) {
                     
            Storage::makeDirectory($directory, true); // Recursive directory creation
        }
           $imagePath = $request->file('image')->store($directory, 'public');

            // save to database
           $post = new Post();
           $post->title = $title;
           $post->slug = $slug;
           $post->user_id = $user_id;
           $post->category_id = $category_id;
           $post->body=$body;
           $post->imagePath = $imagePath;
           
           $post->save();
           
           
           return redirect()->back()->with('status', '👍Post Created Successfully');
    }

    public function edit(Post $post){     
        if(auth()->User()->id !== $post->user->id){
            abort(403);
        }
        return view('blogPosts.edit_blog_post', compact('post'));
    }

    public function update(Request $request, Post $post){   
        if(auth()->User()->id !== $post->user->id){
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
            $title = $request->input('title');
            $slug = Str::slug($title, '-') .'-' . $postId; // '-' -- mean if title is titleone == title-one
            $body = $request->input('body');
 
            //file upload
            $imagePath = 'storage/'. $request->file('image')->store('postImages', 'public'); 
 
             // save to database
            $post->title = $title;
            $post->slug = $slug;
            $post->body=$body;
            $post->imagePath = $imagePath;
            
            $post->save();
            

            return redirect()->back()->with('status', '👍Post Updated Successfully');
    }
    


    // public function show($slug){
    //     $post = Post::where('slug', $slug)->first();
    //     // dd($post);
    //     return view('blogPosts.single-blog-post', compact('post'));
    // }
    
    // using route model binding
    public function show(Post $post){ 
        // $relatedPosts = Post::where('category_id', $post->category_id)->latest()->where('id', '!=', $post->id)->paginate(3);
        $category = $post->category;
        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }

    public function destroy(Post $post){   
       $post->delete();
       return redirect()->back()->with('status', '👍Post Deleted Successfully');
    }
}
