@extends('layouts.app')

@section('content')
    <p class="text-center text-warning">文章列表</p>
    @foreach($posts as $post)
    <div style="text-align: center">
        {{--<a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>--}}
        <a href="{{url('posts', $post->id)}}">{{$post->title}}</a>
        {{--<a href="{{url('posts/'.$post->id)}}">{{$post->title}}</a>--}}
        {{--<a href="action('PostController@show',$post->id)"{{$post->title}}></a><!--不推荐-->--}}
    </div>

    @endforeach

    <div style="margin-left: 1000px">{{$posts->links()}}</div>

@endsection
