<div class="row">
<div class="large-9 columns">
{{ Form::text('title', 'Post Title') }}
</div>
<div class="large-3 columns">
{{ Form::select('category', $categories, Input::old('category')) }}
</div>
</div>
{{ Form::textarea('content') }}
<script type="text/javascript">
	CKEDITOR.replace('content');
</script>
{{ $errors->first('title', '<small class="error">:message</small>'); }}