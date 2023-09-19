
    @extends('layout')

    @section('title')
    <title>Blog - Alphayo Blog</title>
    @endsection
   
        
    @section('main')
        <!-- main -->
     
     <main class="container">
        <h2 class="header-title">All Blog Posts</h2>
        @include('includes.flash-message')
        <div class="searchbar">
            <form action="">
                <input type="text" placeholder="search..." name="search"/>
                <button type="submit">Submit</button>
            </form>
        </div>
        
            <!-- Categories -->
        <div class="categories">
            <ul>
                @foreach($categories as $category)
                <!-- <li><a href="{{route('blog.index', ['category'=>$category->name])}}">{{$category->name}}</a></li> -->
                <li><a href="{{route('blog.index', ['category'=>$category->id])}}">{{$category->name}}</a></li>
               @endforeach
            </ul>
        </div>
        
        <section class="cards-blog latest-blog">
        @forelse($posts as $post)
        <div class="card-blog-content">
        
                <!-- @auth -->
                @if(auth()->User()->id === $post->user->id)
                
                <div class="post-buttons">
                    <a href="{{route('blog.edit', $post)}}">Edit</a>
                    <form action="{{route('blog.destroy', $post)}}" method="post">
                        @csrf
                        @method('delete')
                        
                        <input type="submit" value="Delete">
                    </form>
                </div>
               
                @endif
                <!-- @endauth -->

                <a href="{{route('blog.show', $post)}}" ><img src="{{asset($post->imagePath)}}" alt="image"> </a>
                 <p>{{$post->created_at->diffForHumans()}}
                    <span>Writen by {{$post->User->name}}</span>
                </p>
                <h4>
                   <a href="{{route('blog.show', $post)}}">{{$post->title}}</a>
                </h4> 
            </div>
            @empty
            <p style="background-color:orange; padding:10px; border-radius:5px; margin:5px;
                        text-align:center; color:white;">Sorry! Currently there is no any blog post related to that you search</p>
        @endforelse     
        </section>
          <!-- pagination    -->
          <!-- <div class="pagination" id="pagination">
            <a href="">&laquo;</a>
            <a class="active" href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">&raquo;</a>
        </div></br> -->
        {{$posts->links('pagination::default')}}
</br>
     </main>

       @endsection