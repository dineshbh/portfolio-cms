@extends('layouts.admin')
@section('content')
<h2>Change Category Name</h2>
{{ Form::model($category, array('route' => ['admin.post-categories.update', $category->id], 'method' => 'PUT')) }}
		<div class="row">
<div class="large-12 columns">
{{ Form::label('category') }}
{{ Form::text('category') }}
</div>
	{{ Form::submit('Update', array('class' => 'button')) }}
	{{ Form::close() }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}
@stop