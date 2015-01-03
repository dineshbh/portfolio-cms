@extends('layouts.blog')
@section('content')
@foreach ($posts as $post)
<article>
<h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
	<h3>{{ link_to_route('blog.index', strtoupper($post->title), $post->id) }}</h3>
        <div class="row">
          <div class="large-12 columns">
            {{ $post->content }}
            <ul>
             @foreach ($categories as $category)
            @if ($category->id == $post->category_id)
              <li class="category"><a href="#">{{ strtoupper($category->category) }}</a></li>
            @endif
          @endforeach
          </ul>
          </div>
        </div>
    </article>
@endforeach
@include('blog.partials._comments')
@stop