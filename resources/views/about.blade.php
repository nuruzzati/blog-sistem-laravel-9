@extends('layouts.main')

@section('container')
<h3>About me</h3>
<ul style="list-style: circle">
    <li>{{ $nama }}</li>    
    <li>{{ $kelas }}</li>    
    <li>{{ $jurusan }}</li>    
    <li>{{ $sekolah }}</li>       
</ul>
@endsection

