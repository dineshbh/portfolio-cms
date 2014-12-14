@extends('layouts.admin')
@section('content')
<h2>Edit Post</h2>
	{{ Form::model($post, array('route' => ['admin.posts.update', $post->id], 'method' => 'PUT')) }}
		@include('admin.partials._admin-postform')
	{{ Form::submit('Update', array('class' => 'button')) }}
	{{ Form::close() }}
@stop