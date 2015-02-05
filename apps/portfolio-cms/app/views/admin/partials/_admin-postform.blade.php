<div class="row">
<div class="large-12 columns">
{{ Form::label('Title') }}
{{ Form::text('title') }}
</div>
<div class="large-6 columns">
{{ Form::label('Use Previous Category') }}
{{ Form::select('category', [0=>'Select a category'] + $categories, $category->id) }}
</div>
<div class="large-6 columns">
{{ Form::label('Create New Category') }}
{{ Form::text('new_category') }}
</div>
</div>
{{ Form::textarea('content') }}
<script type="text/javascript">
	CKEDITOR.replace('content');
</script>
{{ $errors->first('title', '<small class="error">:message</small>'); }}
{{ $errors->first('category', '<small class="error">:message</small>'); }}