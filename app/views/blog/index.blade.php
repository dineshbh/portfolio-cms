@extends('layouts.blog')
@section('content')
{{ $posts->links() }}
@foreach ($posts as $post)
<article>
<h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
	<h3>{{ link_to_action('BlogController@show', $post->title, $post->id) }}</h3>
        <div class="row">
          <div class="large-12 columns">
            {{ str_limit($post->content, $limit = 800, $end = '...') }}
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
@stop