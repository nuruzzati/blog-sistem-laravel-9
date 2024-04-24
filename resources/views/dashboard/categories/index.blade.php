@extends('dashboard.layouts.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
     </div>



     
        <div class="table-responsive col-lg-12">
            <a href="/dashboard/categories/create" class="btn btn-primary mb-3 d-flex align-items-center gap-1" style="width: fit-content"><span data-feather="plus-circle"></span> <span>Create new category</span></a>
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
              <th scope="col">Category name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categories as $category)   
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a class="badge bg-warning my-1" href="/dashboard/categories/{{ $category->slug }}/edit"><span data-feather="edit"></span></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('are you sure deleted this category?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection