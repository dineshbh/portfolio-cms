<div class="row">
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
	<!-- if date isn't set, set it to current date -->
	@if(isset($galleryitem->date))
		<?php $date = explode('-', $galleryitem->date);	?>
	@else
		<?php $date = explode('-', date('Y-m-d')); ?>
	@endif
	<?php 
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
	CKEDITOR.replace('image_text');
</script>

{{ Form::submit('Submit', array('class' => 'button')) }}
{{ Form::close() }}	