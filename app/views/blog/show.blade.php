@extends('layouts.blog')
@section('content')
<article>
	<h3>{{ link_to_route('blog.show', $post->title, $post->id) }}</h3>
        <h6>Written by <a href="#">John McLachlan</a> on {{{ $post->created_at }}}</h6>
        <h6>
          @foreach ($categories as $category)
            @if ($category->id == $post->category_id)
              {{ "Category: " }} 
              <a href="#">{{ $category->category }}</a>
            @endif
          @endforeach
        </h6>
        <div class="row">
          <div class="large-12 columns">
            <img class="blog_thumb" src="http://placehold.it/800x240&text=[img]"/>
            {{ $post->content }}
          </div>
        </div>
    </article>
@stop