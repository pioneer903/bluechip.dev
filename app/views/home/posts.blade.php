@extends('layouts.master')

@section('nav')
@stop

@section('content')
	<div class="span3">
		@foreach ($users as $user)
			<p>{{ $user->first_name}}</p>
		@endforeach

	</div>
	
@stop



@section('footer')

	<footer>
		<hr>
		Copyright
	</footer>
@stop

