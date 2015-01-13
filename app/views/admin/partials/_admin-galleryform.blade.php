<div class="row">
		<div class="large-9 columns">
			<div class="image_preview">
				<a target="_blank" href="{{ asset($galleryitem->image_url) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a>
			</div>
			<p>Filename: {{ basename($galleryitem->image_url) }}<p>
		</div>
		<div class="large-9 columns">
			@include ('admin/partials/_admin-uploadform')
        </div>

	{{ Form::model($galleryitem, array('route' => ['admin.gallery.update', $galleryitem->id], 'method' => 'PUT')) }}
	<div class="large-7 columns">
		{{ Form::label('Title') }}
		{{ Form::text('title') }}
	</div>
	<div class="large-5 columns">
		{{ Form::label('Category') }}
		{{ Form::select('category', [0=>'Select a category'] + $categories, $category) }}
	</div>
		<div class="large-7 columns">
		{{ Form::label('Link') }}
		{{ Form::text('image_link') }}
	</div>
	<?php 
		$date = explode('-', $galleryitem->date);
		$month = $date[1];
		$year = $date[0];
	?>
	<div class="large-3 columns">
		{{ Form::label('Month') }}
		{{ Form::selectMonth('month', $month) }}
	</div>
	<div class="large-2 columns">
		{{ Form::label('Year (YYYY)') }}
		{{ Form::text('year', $year, array('maxlength' => '4')) }}
	</div>
</div>
{{ Form::textarea('image_text') }}
<script type="text/javascript">
	CKEDITOR.replace('text');
</script>
{{ $errors->first('title', '<small class="error">:message</small>'); }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}