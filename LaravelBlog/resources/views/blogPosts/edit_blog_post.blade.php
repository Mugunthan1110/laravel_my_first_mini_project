@extends('layout')

@section('main')

<main class="container" style="background-color:#fff;">
<section id="contact-us">
    
    <h1 style="padding-top:50px;">Edit Post!</h1>
<!-- edit Form -->
          
            <div class="contact-form">
                <form action="{{route('blog.update', $post)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- Title -->
                    @include('includes.flash-message')
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{$post->title}}"/>
                    @error('title')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    
                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="image"/>
                    @error('image')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror 

                    <!-- Body-->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{$post->body}}</textarea>
                   @error('body')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Update" />
                </form>
            </div>
    </section>

</main>
@endsection