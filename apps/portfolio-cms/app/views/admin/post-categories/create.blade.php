@extends('layouts.admin')
@section('content')
<h2>Create New Category</h2>
	{{ Form::open( array ('route' => 'admin.post-categories.store')) }}
		<div class="row">
<div class="large-12 columns">
{{ Form::label('category') }}
{{ Form::text('category') }}
</div>
	{{ Form::submit('Create', array('class' => 'button')) }}
	{{ Form::close() }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}
@stop