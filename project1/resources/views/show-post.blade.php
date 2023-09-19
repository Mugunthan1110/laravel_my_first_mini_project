@extends('layouts.app')

    @section('content')
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{$post->title}}</h1>
                    <p class="lead mb-0">{{$post->post_text}}</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
    @endsection
        
