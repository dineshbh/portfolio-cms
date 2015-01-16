@extends('layouts.admin')
@section('content')
<h2>Edit Gallery Item</h2>
	{{ Form::model($galleryitem, array('route' => ['admin.gallery.update', $galleryitem->id], 'method' => 'PUT')) }}
		@include('admin.partials._admin-galleryform')

		@if(!empty($galleryitem->image_url))
		<div class="large-12 columns">
		<h4>Current Image</h4>
			<div class="image_preview">
				<a target="_blank" href="{{ asset($galleryitem->image_url) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a>
			</div>
			<p>Filename: {{ basename($galleryitem->image_url) }}<p>
		</div>
		<div class="large-12 columns">
		<h4>Upload a new image file</h4>
			{{ Form::model($galleryitem, array('id' => 'upload_form', 'action' => array('GalleryController@uploadImageFile', $galleryitem->id), 'files' => true, 'onsubmit' => 'return checkForm()')) }}
			@include ('admin/partials/_admin-uploadform')
        </div>
		@else
			<div class="large-12 columns">
		<h4>No Image selected please upload an image file</h4>
			{{ Form::model($galleryitem, array('id' => 'upload_form', 'action' => array('GalleryController@uploadImageFile', $galleryitem->id), 'files' => true, 'onsubmit' => 'return checkForm()')) }}
			@include ('admin/partials/_admin-uploadform')
        </div>
		@endif
		

{{ $errors->first('title', '<small class="error">:message</small>'); }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}
@stop