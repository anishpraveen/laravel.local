@extends('master')


@section('content')

     <h1>Posts</h1>   

    
    <article>
    <h2>{{$post->postname}}</h2> 
     &nbsp&nbsp&nbsp{{$post->published_on}}
    </article>

   

@stop