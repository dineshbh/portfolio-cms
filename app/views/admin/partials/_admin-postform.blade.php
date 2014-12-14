<div class="row">
<div class="large-9 columns">
{{ Form::label('Title') }}
{{ Form::text('title') }}
</div>
<div class="large-3 columns">
{{ Form::label('Category') }}
{{ Form::select('category', [0=>'Select a category'] + $categories, $category) }}
</div>
</div>
{{ Form::textarea('content') }}
<script type="text/javascript">
	CKEDITOR.replace('content');
</script>
{{ $errors->first('title', '<small class="error">:message</small>'); }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}