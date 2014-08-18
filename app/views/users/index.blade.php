@extends('layouts.master')

@section('nav')
	
@endsection

@section('content')
	<div class="welcome">
		
		<h1>You have arrived.</h1>
		<h2>All users</h2>
		<p>{{ HTML::link('create','Add a new user') }} </p>
		@if(isset($users))
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Email</th>
						<th>First Name</th>
						<th>Username</th>
						<th>Last Name</th>
						<th>Birth Date</th>
						<th>Height</th>
						<th colspan="2">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{ $u->email }} </td>
						<td>{{ $u->first_name }} </td>
						<td>{{ $u->username }} </td>
						<td>{{ $u->last_name }} </td>
						<td>{{ $u->birth_date }} </td>
						<td>{{ $u->height }} </td>
						<td>{{ link_to_route('users.edit', 'Edit', array($u->id), array('class' => 'btn btn-info')) }}
						<td>{{ Form::open(array('method' =>'DELETE', 'route' => array('users.destroy', $u->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} 
							{{ Form::close() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			There are no users
		@endif
		
		<hr>
		{{ Form::open() }}
		{{ Form::text('first_name', '', array('placeholder' => 'First Name')) }}<br>
		{{ Form::submit('Add player', array('class' => 'btn btn-success'))}}
		{{ Form::close() }}

	</div>
@stop

@section('footer')

	<footer>
		<hr>
		Copyright
	</footer>
@stop