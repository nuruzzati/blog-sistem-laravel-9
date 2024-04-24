@extends('dashboard.layouts.main')

@section('container')
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Posts</h1>
        </div>
        <button type="submit" class="btn btn-primary mb-2 d-flex align-items-center gap-1"><span data-feather="arrow-left"></span> <span> <a href="/dashboard/posts" class="text-white text-decoration-none">Back to post</a></span></button>

        <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" > 
               @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
           <select class="form-select" name="category_id">
            @foreach ($categories as $category)       
                @if (old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}" >{{ $category->name }}</option>
                @endif
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid d-block mb-3 col-sm-5">
            <input class="form-control  @error('image') is-invalid @enderror"  name="image" type="file" id="image" onchange="previewImage()">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                
            <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body') }}">
             <trix-editor input="body"></trix-editor>
                @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>


    
        <button type="submit" class="btn btn-success d-flex align-items-center gap-1"><span data-feather="plus-circle"></span> <span> Create Post</span></button>
        </form>
        </div>

        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            });

            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })


        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            if (image.files && image.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

                reader.readAsDataURL(image.files[0]);
            }
        }





        </script>

@endsection