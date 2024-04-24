@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 bg-white rounded-full shadow-sm p-5 ">
        <main class="form-signin">
            <form action="/register" method="post">
                @csrf
                <h2 class="text-center mb-5">
                    <i class="bi bi-pencil"></i> Nuzablog
                </h2>
                <h5 class=" mb-3 fw-normal">Registration form</h5>
                
                <div class="form-floating">
                  <input value="{{ old('name') }}" type="text" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="name@example.com" name="name">
                  <label for="name">Name</label>
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input value="{{ old('username') }}" type="text" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="name@example.com" name="username">
                  <label for="username">Username</label>
                    @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
        <div class="form-floating">
            <input value="{{ old('email') }}" type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="name@example.com">
          <label for="email">Email address</label>
            @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control @error('password')is-invalid @enderror" id="password" name="password" placeholder="Password">
          <label for="password">Password</label>
            @error('password')
                  <div class="invalid-feedback mb-2" style="margin-top: -10px">
                    {{ $message }}
                  </div>
                @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      </form>

      <small class="text-center d-block mt-3" >You have account? <a href="/login">Login Now!</a></small>
    </main>
    </div>
</div>

@endsection