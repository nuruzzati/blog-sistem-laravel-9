@extends('layouts.main')

@section('container')

@auth
<div class="jumbotron">
  <h1 class="display-4">Hello, {{ auth()->user()->name }}!</h1>
  <p class="lead">Now you can create your own blog easily</p>
  <hr class="my-4">
  <p>make the blog as creative as possible</p>
  <a class="btn btn-primary btn-lg" href="/dashboard" role="button">create a blog now</a>
</div>
    @else
    <h4>Welcome to Nuza Blog !!</h4>
@endauth
@endsection

