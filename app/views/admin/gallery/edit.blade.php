@extends('layouts.admin')
@section('content')
<h2>Edit Gallery Item</h2>
		@include('admin.partials._admin-galleryform')
	{{ Form::submit('Update', array('class' => 'button')) }}
	{{ Form::close() }}
@stop