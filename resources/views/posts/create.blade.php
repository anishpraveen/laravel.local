@extends('master') @section('content')
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
				@include('posts._form',['submitButton'=>'Add Post','inputPostText'=>''])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection 

@section('footer')

@include('errors.list')

<!--
// Sample form
 
      <?php
         echo Form::open(array('url' => 'foo/bar'));
            echo Form::text('username','Username');
            echo '<br/>';
            
            echo Form::text('email', 'example@gmail.com');
            echo '<br/>';
     
            echo Form::password('password');
            echo '<br/>';
            
            echo Form::checkbox('name', 'value');
            echo '<br/>';
            
            echo Form::radio('name', 'value');
            echo '<br/>';
            
            echo Form::file('image');
            echo '<br/>';
            
            echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
            echo '<br/>';
            
            echo Form::submit('Click Me!');
         echo Form::close();
      ?>
   -->
@endsection