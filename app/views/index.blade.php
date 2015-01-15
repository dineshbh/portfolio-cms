@extends('layouts.home')
@section('content')
		<h2>Hi! I'm John. I develop websites and edit videos. On this site you can find examples of projects I've worked on, as well as my latest musings on my blog.</h2>
		<hr>
		
	<div class="large-6 medium-6 columns">
	<h3>My Latest Project</h3>
	 <a href="{{ action('ProjectsController@show', $galleryitem->id) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a>
	 <h3>{{ link_to_action('ProjectsController@show', $galleryitem->title, $galleryitem->id) }}</h3>
	 <h6 class="subheader">{{ date('M Y', strtotime($galleryitem->date)) }}</h6>
	</div>

	<div class="large-6 medium-6 columns">
	<h3>My Latest Blog Post</h3>
	<h3>{{ link_to_action('BlogController@show', $post->title, $post->id) }}</h3>
	<h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
	 {{ str_limit($post->content, $limit = 800, $end = '...') }}
	</div>
@stop
