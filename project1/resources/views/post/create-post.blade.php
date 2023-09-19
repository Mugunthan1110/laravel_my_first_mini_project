@extends('layouts.layout')

@section('content')
<main class="container" style="background-color:#fff;">
<section id="contact-us">
    
    <h1 style="padding-top:50px;">Create New Post!</h1>
    @if(session('status'))
    <p style="background-color:green; padding:10px; border-radius:5px; margin:5px;
    text-align:center; color:white;">{{session('status')}}</p>

 @endif
<!-- Create Form -->
            <div class="contact-form">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{old('title')}}"/>
                    @error('title')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    
                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="image" />
                    @error('image')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Category Drop Down-->
                    <label for="categories"><span>Choose a Category:</span></label>
                    <select name="category" id="categories">
                        <option selected disabled>Selected Option</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach            
                    </select>
                    @error('category')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    

                    <!-- Body-->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{old('body')}}</textarea>
                    @error('body')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
    </section>

</main>
@endsection