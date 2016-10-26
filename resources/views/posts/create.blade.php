@extends('master')


@section('content')
<h1>
	Add new post</h1>
<!--
<div class="container">
	<div class="row">
		<div class="col-lg-5">
			<form method="POST" action="" class="form-group">
				
				<input type="text" name="post" placeholder="Postname" class="form-control" />
				
				<input type="submit" class="btn btn-primary  form-control" value="button">

			</form>
		</div>
	</div>
</div>-->
<div class="container">
	<div class="row">
		<div class="col-lg-5">
			{!! Form::open(['url' => 'posts' ] ) !!}
			<div class="form-group ">
				{!! Form::text('inputPost', null, ['class' => 'form-control', 'placeholder' => 'Post']) !!}
			</div>
            <div class="form-group ">
				{!! Form::submit('Add post', ['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}

		</div>
	</div>
</div>
@stop