
@extends('layout')

@section('main')

<main class="container" style="background-color:#fff;">
<section id="contact-us">
    
    <h1 style="padding-top:50px;">Edit Category!</h1>
<!-- Create Form -->
            <div class="contact-form">
                <form action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Title -->
                   @include('includes.flash-message')
                    <label for="title"><span>Category Name</span></label>
                    <input type="text" id="name" name="name" value="{{$category->name}}"/>
                    @error('name')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
            <div class="create-categories">
                <a href="{{route('categories.index')}}">Categories List <span>&#8594;</span></a>
            </div>
    </section>

</main>
@endsection
