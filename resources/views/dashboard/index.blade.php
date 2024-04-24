@extends('dashboard.layouts.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }} You log in as {{ auth()->user()->role }}</h1>
     </div>
@endsection