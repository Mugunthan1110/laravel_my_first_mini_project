
@extends('layout')
    @section('title')
    <title>Dashboard - Alphayo Blog</title>
    @endsection
    

        <!-- header -->
        @section('header')
        <header class="header" style="background-image:url({{asset('images/photography.jpg')}})">
            <div class="header-text">
                <h1>Alphayo Blog</h1>
                <h4>Dashboard of verified news...</h4>
            </div>
        </header>
        @endsection
        
        @section('main')
        <!-- main -->
     <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
        <!-- @foreach($posts as $post)
        
        <div class="card-blog-content">
               <a href="{{route('blog.show', $post)}}"> <img src="{{asset($post->imagePath)}}" alt=""> </a>
                <p>{{$post->created_at->diffForHumans()}}
                    <span style="float:right">Writen by {{$post->User->name}}</span>
                </p>
                <h4 style="font-waight:bolder">
            <a href="{{route('blog.show', $post)}}">{{$post->title}}</a>
                </h4>
            </div>
        @endforeach    -->

        </section>
     </main>
    @endsection
       