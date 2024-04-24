@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
            
                <p>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            
               @if ($post->image)   
               <div style="max-height: 350px; overflow: hidden;">
                   <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
               </div>
               @else
               <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
               @endif

                <article class="my-3 fs-5">
                    {!!  $post->body !!}
                </article>

             <form id="loveForm" class="mb-5">
    <button type="button" id="loveButton" class="btn btn-outline-danger">
        <i class="bi bi-heart"></i> <span id="loveCount"></span>
    </button>
</form>

            
               <a class="d-block text-decoration-none mt-2 pb-5" href="/posts">Back to posts</a>
            </div>
        </div>
    </div>


       <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-4">Comments</h2>

   <!-- Form komentar -->
            <form action="/posts/comments" method="post">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Your Comment</label>
                    <textarea placeholder="Submit your comments here" class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- Daftar komentar -->
            <div class="mt-4">
                @php
                    $comments = [
                        ['user' => ['name' => 'nuzaxz'], 'body' => 'Keren banget tutorrialnya ommm, lanjutkan'],
                        ['user' => ['name' => 'john_doe'], 'body' => 'Ini juga bagus!'],
                        ['user' => ['name' => 'jane_doe'], 'body' => 'Sangat bermanfaat!'],
                    ];
                @endphp

                @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment['user']['name'] }}</h5>
                        <p class="card-text">{{ $comment['body'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Skrip JavaScript -->
<script>
    // Fungsi untuk mendapatkan angka acak dari 1 hingga 100
    function getRandomNumber() {
        return Math.floor(Math.random() * 100) + 1;
    }

    // Set nilai awal untuk loveCount saat dokumen dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var loveCountElement = document.getElementById('loveCount');
        loveCountElement.textContent = getRandomNumber();
    });

    // Fungsi untuk menangani tindakan klik pada tombol "Love"
    document.getElementById('loveButton').addEventListener('click', function() {
        var loveCountElement = document.getElementById('loveCount');
        var loveCount = parseInt(loveCountElement.textContent);
        loveCount++;
        loveCountElement.textContent = loveCount;
    });
</script>



@endsection