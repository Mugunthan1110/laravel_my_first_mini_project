
@extends('layouts.layout')

@section('content')  
<!-- main -->
 <main class="container">
    <section class="single-blog-post">
    <h1>{{$post->title}}</h1>
            <p class="time-and-author">
            
            <span>Writen by {{$post->User->name}}   </span>
            </p>
            <span>{{  $post->created_at->diffForHumans() }} </span>
            <div class="single-blog-post-contentImage" data-aos="fade-left">
                <img src="{{asset($post->imagePath)}}" alt="img">
            </div>

            
            <div class="about-text">
                <p>{{$post->post_text}}</p>
            </div>
        <section class="recomended">
            <p>Related</p>
        <div class="recommended-cards">
      
        @foreach($relatedPosts as $relatedPost) 
        <a href="{{route('singlePost.show', $relatedPost)}}">
            <div class="recommended-card">
                <img src="{{asset($relatedPost->imagePath)}}" alt="" loading="lazy">
                <h4>{{$relatedPost->title}}</h4>
            </div>
        </a>
        @endforeach
        
        </div>
    </section>
 </main>
 @endsection
