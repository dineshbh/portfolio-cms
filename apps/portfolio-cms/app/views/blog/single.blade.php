@extends('layouts.blog')
@section('content')
@foreach ($posts as $post)
<article>
<h2>{{ link_to_route('blog.index', $post->title, $post->id) }}</h2>
<h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
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
@include('blog.partials._comments')
@endforeach
@stop