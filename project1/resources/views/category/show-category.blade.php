@extends('layouts.layout')

@section('content')
<main class="container" style="background-color:#fff;">
<section id="contact-us">
    
    <h1 style="padding-top:50px;">Category Lists!</h1>
    @if(session('status'))
    <p style="background-color:green; padding:10px; border-radius:5px; margin:5px;
                                text-align:center; color:white;">{{session('status')}}</p>
    @endif
    <div class="card mb-4">
        <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list-unstyled mb-0">
                            
                            @foreach($categories as $category)
                            <li>{{$category->name}}    
                                <!-- <a href="{{route('category.edit', $category)}}"><button style="border-radius:5px; background-color:green; color:white">Edit</button></a>   <a href="{{route('category.delete', $category)}}"><button style="border-radius:5px; background-color:red; color:white">  Delete</button></a></li></br> -->
                            @endforeach
                        </ul>
                    </div>
                                
                </div>
            </div>
        </div>
    </section>

</main>
@endsection