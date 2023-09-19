@extends('layouts.layout')

@section('content')

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4" 
        style='background-image:url(images/bg01.png);'>
            <div class="container">
            <div class="text-center my-5" style="color:white;">
                    <h1 class="fw-bolder">Welcome to Show your posts </h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{route('singlePost.show', $post->id )}}"><img class="card-img-top" src="{{asset($post->imagePath)}}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{$post->created_at}}</div>
                                    <h2 class="card-title h4">{{$post->title}}</h2>
                                    <p class="card-text">{{$post->post_text}}</p>
                                    <a style="background-color" class="btn btn-primary" href="{{route('singlePost.show', $post->id )}}">Read more →</a>
                                    <a style="background-color:green;" class="btn btn-primary" href="{{route('post.edit', $post)}}">Edit</a>
                                    <a style="background-color:red;" class="btn btn-primary" href="{{route('post.delete', $post)}}">Delete</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p style="background-color:orange; padding:10px; border-radius:5px; margin:5px;
                        text-align:center; color:white;">Sorry! Currently there is no any blog post related to that your search</p>
                        @endforelse
                    </div>
                    <!-- Pagination-->
                    <!-- <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav> -->
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                            @foreach($categories as $category)
                                <div class="col-sm-4">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('post.show', ['category'=>$category->id])}}">{{$category->name}}</a></li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        {{$posts->links('pagination::default')}}
        
        @endsection
        