@extends('layouts.layout')

@section('content')
<main class="container" style="background-color:#fff;">
<section id="contact-us">
    
    <h1 style="padding-top:50px;">Create New Category!</h1>
<!-- Create Form -->
            <div class="contact-form">
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                    <!-- Title -->
                    @if(session('status'))
    <p style="background-color:green; padding:10px; border-radius:5px; margin:5px;
    text-align:center; color:white;">{{session('status')}}</p>

 @endif
                    <label for="title"><span>Category Name:</span></label>
                    <input type="text" id="name" name="name" value=""/>
                    @error('name')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Save" />
                </form>
            </div>
    </section>

</main>
@endsection