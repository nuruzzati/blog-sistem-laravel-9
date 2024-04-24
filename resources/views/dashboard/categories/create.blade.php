@extends('dashboard.layouts.main')

@section('container')
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New category</h1>
        </div>
        <button type="submit" class="btn btn-primary mb-2 d-flex align-items-center gap-1"><span data-feather="arrow-left"></span> <span> <a href="/dashboard/categories" class="text-white text-decoration-none">Back to categories</a></span></button>

        <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autofocus>
            @error('name')
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


    
        <button type="submit" class="btn btn-success d-flex align-items-center gap-1"><span data-feather="plus-circle"></span> <span> Create Categories</span></button>
        </form>
        </div>


        <script>
                const name = document.querySelector('#name');
            const slug = document.querySelector('#slug');

            name.addEventListener('change', function() {
                fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            });

            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })
        </script>
@endsection