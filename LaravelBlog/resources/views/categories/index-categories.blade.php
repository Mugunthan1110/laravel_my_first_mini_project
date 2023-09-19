@extends('layout')

@section('main')

<main class="container" style="background-color:#fff;">
<section>
    <div class="categories-list">
        <h1> Categories List</h1>
        @include('includes.flash-message')
        @foreach($categories as $category)
        <div class="item">
            <p>{{$category->name}}</p>
            <div><a href="{{route('categories.edit', $category)}}">Edit</a></div>
            <form action="{{route('categories.destroy', $category)}}" method="post">
            @csrf
            @method('delete')
                <input type="submit" value="delete">
            </form>
        </div>
        @endforeach
        <div class="index-categories">
    <a href="{{route('categories.create')}}">Create Category<span>&#8594;</span></a>
</div>
    </div>
</section>

</main>
@endsection