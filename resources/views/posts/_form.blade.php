<div class="form-group ">
	{!! Form::text('inputPost', $inputPostText, ['class' => 'form-control', 'placeholder' => 'Post']) !!}
</div>
<div class="form-group ">
	{!! Form::input('date', 'inputPublishedOn', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'date']) !!}
</div>
<div class="form-group ">
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>