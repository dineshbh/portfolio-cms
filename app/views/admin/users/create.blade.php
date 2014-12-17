@extends('layouts.admin')
@section('content')
<h2>Create User</h2>
	{{ Form::open( array ('route' => 'admin.users.store')) }}
		<div class="row">
			<div class="large-6 columns">
				{{ Form::label('Username') }}
				{{ Form::text('username') }}
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
					{{ Form::label('password') }}
					{{ Form::password('password') }}
			</div>
		</div>
	{{ Form::submit('Create', array('class' => 'button')) }}
	{{ Form::close() }}
	<p>{{ link_to_route('admin.users.index', '< Go Back') }}</p>
@stop