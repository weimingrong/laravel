@extends('layouts.app')

@section('content')
    <p style="text-align: center">posts index page</p>
    @foreach($posts as $post)
    <div style="text-align: center">
        {{$post->title}}
    </div>

    @endforeach

    <div style="margin-left: 1000px">{{$posts->links()}}</div>

@endsection
