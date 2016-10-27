@extends('master')


@section('content')

     <h1>Posts</h1>   

    
    <article>
    <h2>{{$post->postname}}</h2> 
     &nbsp&nbsp&nbsp{{$post->published_now}}
     </br>
     <a href="{{$post->id}}/edit">Edit</a>
    </article>

   

@stop