@extends('layouts.master')

@section('nav')
	
@endsection

@section('content')
	<div class="content">
		
		@if ( Auth::guest() )
	        <h1>Hello, Please {{ HTML::link('login', 'Log in') }}</h1>
	    @else
	    	<h2>Hello, <b> {{ Auth::user()->username}}</b> </h2>
	        <p>{{ HTML::link('players/create','Add a new Player') }} </p>
	     
		    <h2>All Players</h2>
			@if(isset($seasons))
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" title="Select All"/> </th>
							<th>Email</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Grad Year</th>
							<th>Birth Date</th>
							<th>Paid</th>
							<th colspan="3">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($seasons as $season)
							<?php  $class = $season->players()->get()  ?>
							@foreach($class as $u)
								<tr>
									<td><input type="checkbox" title="Select Player"/></td>
									<td>{{ $u->first_name }} </td>
									<td>{{ $u->last_name }} </td>
									<td><a href="mailto:{{ $u->email }}?Subject=Contact%20from%20Blue%20Chip" target="_top">{{ $u->email }} </a></td>
									<td>{{ $u->season_id }} </td>
									<td>{{ $u->birth_date }} </td>
									<td>{{ $u->paid }} </td>
									<td>{{ link_to_route('players.show', 'View', array($u->id), array('class' => 'btn btn-info'))}} 
									<td>{{ link_to_route('players.edit', 'Edit', array($u->id), array('class' => 'btn btn-info')) }}
									<td>{{ Form::open(array('method' =>'DELETE', 'route' => array('players.destroy', $u->id))) }}
										{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} 
										{{ Form::close() }}</td>
								</tr>
							@endforeach	
						@endforeach
					</tbody>
				</table>
			@else
				There are no Players
			@endif
		@endif
		<hr>
		
	</div>
@stop

@section('footer')

	<footer>
		<hr>
		Copyright
	</footer>
@stop