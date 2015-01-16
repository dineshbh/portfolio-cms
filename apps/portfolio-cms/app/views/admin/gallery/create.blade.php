@extends('layouts.admin')
@section('content')
<h2>Create Gallery Item</h2>
	{{ Form::open( array ('route' => 'admin.gallery.store')) }}
		@include('admin.partials._admin-galleryform')

{{ $errors->first('title', '<small class="error">:message</small>'); }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}
@stop