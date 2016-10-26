@extends('master')


@section('content')

     <h1>Posts</h1>   

    @foreach($posts as $post)

    <article>
    <a href="{{ action('PostsController@show', [$post->id]) }}">
    <h2>{{$post->postname}}</h2> </a>
     &nbsp&nbsp&nbsp{{$post->published_on}}
    </article>

    @endforeach

@stop