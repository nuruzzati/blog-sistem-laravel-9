@extends('dashboard.layouts.main')

@section('container')
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New User</h1>
        </div>
        <button type="submit" class="btn btn-primary mb-2 d-flex align-items-center gap-1"><span data-feather="arrow-left"></span> <span> <a href="/dashboard/users" class="text-white text-decoration-none">Back to users</a></span></button>

        <div class="col-lg-8">
        <form method="post" action="/dashboard/users" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" > 
               @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" > 
               @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" > 
               @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

       <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role">
                @foreach ($roles as $role)       
                    <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>



    
        <button type="submit" class="btn btn-success d-flex align-items-center gap-1"><span data-feather="plus-circle"></span> <span> Create User</span></button>
        </form>
        </div>

        @endsection