@extends('layouts.master')

@section('nav')
@stop

@if (Session::has('message'))
        <div class="flash alert">
            <p>{{ Session::get('message') }}</p>
        </div>
    @else
    	<div class="flash alert">
            <p>No session</p>
        </div>
    @endif

    @yield('content')

@section('content')

	

	@if(isset($users))
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{ $u->first_name }} </td>
						<td>{{ $u->last_name }} </td>
						<td><a href="/">Edit </td></a>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			There are no users
		@endif
	
@stop



@section('footer')

	<footer>
		<hr>
		Copyright
	</footer>
@stop

