@extends('layouts.app')

@section('content')
posts index page
    @foreach($posts as $post){
    <div class="center">
        {{$post->title}}
    </div>

    @endforeach

    {{$posts->links()}}

    @endsection