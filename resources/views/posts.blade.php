@extends('layouts.main')

@section('container')

    
<h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Search..." name="search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

@if ($posts->count())
<div class="card mb-3">
    
    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">Latest</div>
    @if ($posts[0]->image)   
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name}}">
            @endif
  <div class="card-body text-center">
    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
        <h3 class="card-title">{{ $posts[0]->title }}</h5>
    </a>
    <p>
        <small class="text-muted">
        By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }} </a> in  <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
    </p>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>
    <a  class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read more</a>
  </div>
</div>



<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
            </div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            @else
                <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{  $post->title }}</h5>
                <p>
                    <small class="text-muted">
                        @if ($post->author) <!-- Memeriksa apakah penulis tersedia -->
                            By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                        @else
                            By Unknown Author <!-- Atau sesuaikan dengan pesan yang sesuai jika penulis tidak tersedia -->
                        @endif
                    </small>
                </p>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
@endforeach

    </div>
</div>

@else
    <div class="row text-center">
        <div class="col">
        <p class="text-center fs-4">  Sorry! <br> <span id="searchText" class="text-decoration-underline-danger fw-small fst-italic">{{ request('search') }}</span> not in our blogs list</p>

        <a href="{{ url()->previous() }}" class="text-center text-decoration-none btn btn-danger">back to post?</a>
    </div>
</div>
@endif

<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchText = document.getElementById('searchText');
        var words = searchText.textContent.trim().split(/\s+/);
        
        if (words.length > 5) {
            // Menggabungkan hanya 10 kata pertama
            var shortenedText = words.slice(0, 5).join(' ');
            searchText.textContent = shortenedText + '... and others';
        }
    });
</script>

