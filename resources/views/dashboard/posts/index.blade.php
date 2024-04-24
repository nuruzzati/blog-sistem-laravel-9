@extends('dashboard.layouts.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
     </div>



     
        <div class="table-responsive col-lg-12">
            <a href="/dashboard/posts/create" class="btn btn-primary mb-3 d-flex align-items-center gap-1" style="width: 165px"><span data-feather="plus-circle"></span> <span>Create new post</span></a>
            @if (session()->has('succes'))
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  {{ session('succes') }}
                </div>
              </div>
            @endif
            @if (session()->has('delete'))
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  {{ session('delete') }}
                </div>
              </div>
            @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)   
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a class="badge bg-info" href="/dashboard/posts/{{ $post->slug }}"><span data-feather="eye"></span></a>
                <a class="badge bg-warning my-1" href="/dashboard/posts/{{ $post->slug }}/edit"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('are you sure deleted this post?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection