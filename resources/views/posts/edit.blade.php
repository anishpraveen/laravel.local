@extends('master') 
@section('content')

<h1>Edit: {{ $post->postname}}</h1>
<div class="container">
	<div class="row">
		<div class="col-lg-5">
			{!! Form::model($post,['method' => 'PATCH', 'action'=> ['PostsController@update', $post->id] ] ) !!}
				@include('posts._form',['submitButton'=>'Edit Post', 'inputPostText'=>$post->postname])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection 

@section('footer')

@include('errors.list')
@endsection