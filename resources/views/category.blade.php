@extends('layouts.main')

@section('container')

    
<h1 class="mb-5">Post Category {{ $category }}</h1>

@foreach ($posts as $post)
<article>
    <h2><a class="text-decoration-none" href="/posts/{{ $post->slug }}">{{  $post->title }}</a></h2>
    <p>{{ $post->excerpt }}</p>
</article>
    
@endforeach

@endsection

