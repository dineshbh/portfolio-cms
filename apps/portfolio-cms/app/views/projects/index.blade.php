@extends('layouts.projects')
@section('content')
<div class="row">
  <div class="large-12 columns">
  
  <div class="nav-bar right">
    @if(isset($selectedCategory))
      <li class="category">{{ link_to_action('ProjectsController@index','ALL') }}</li>
    @else
      <li class="category active">{{ link_to_action('ProjectsController@index','ALL') }}</li>
    @endif
    @foreach ($categories as $category)
      @if(isset($selectedCategory))
        <li class={{ $selectedCategory->id == $category->id ? '"category active"' : '"category"' }}>
        {{ link_to_route('project_category', strtoupper($category->category), $category->id) }}</li>
      @else
        <li class="category">{{ link_to_route('project_category', strtoupper($category->category), $category->id) }}</li>
      @endif
    @endforeach
    </div>

    @if(isset($selectedCategory))
      <h3>{{ $selectedCategory->category }}</h3>
    @else
      <h3>All Projects</h3>
    @endif
  </div>

  <div class="large-12 columns">
    @foreach ($galleryitems as $galleryitem)
      <div class="large-4 medium-6 small-12 columns">
      
        <a href="{{ action('ProjectsController@show', $galleryitem->id) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a>

        <div class="panel">
          <h3>{{ link_to_action('ProjectsController@show', $galleryitem->title, $galleryitem->id) }}</h3>
          <h6 class="subheader">{{ date('M Y', strtotime($galleryitem->date)) }}</h6>
        </div>
      </div>
      @endforeach
    </div>
    </div>
@stop