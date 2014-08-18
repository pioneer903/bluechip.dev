@extends('layouts.master')

@section('nav')
	
@endsection

@section('content')
	<div class="welcome">
		
		<div class="container">
			<div class="span4 well">
				<legend>Add a player</legend>
				{{ Form::open(array('url' => '/')) }}
				{{ Form::text('first_name', '', array('placeholder' => 'First Name')) }}<br>
				{{ Form::text('last_name' , '', array('placeholder' => 'Last name')) }} <br>
				{{ Form::text('birth_date', '', array('placeholder' => 'Birth Date')) }}<br>
				{{ Form::text('height', '', array('placeholder' => 'Height')) }} <br>
				{{ Form::text('email','', array('placeholder' => 'Email')) }} <br>
				{{ Form::text('username','', array('placeholder' => 'Username')) }} <br>
				{{ Form::password('password','', array('placeholder' => 'password')) }} <br>
				{{ Form::password('password_confirmation','', array('placeholder' => 'password')) }} <br>
				{{ Form::submit('Add player', array('class' => 'btn btn-success'))}}
				{{ Form::close() }}
			</div>
			<div class="span4 well">
				@if($errors->any())
				<ul>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</ul>
				@endif
			</div>
		</div>



	</div>
@stop

@section('footer')

	<footer>
		<hr>
		Copyright
	</footer>
@stop