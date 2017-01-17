@extends('template')

@section('title')
    Blog
@endsection

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
    @endforeach

@endsection
