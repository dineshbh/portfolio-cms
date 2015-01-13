@extends('layouts.projects')
@section('content')
<div class="large-12 columns">
  <div class="row">
    @foreach ($galleryitems as $galleryitem)
      <div class="large-9 medium-9 small-12 columns">
      
        {{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}
      </div>
        <div class="large-3 medium-3 small-12 columns">
          <h5>{{ $galleryitem->title }}</h5>
          <h6 class="subheader">{{ date('M Y', strtotime($galleryitem->date)) }}</h6>
          <p>{{ $galleryitem->image_text }}</p>
        </div>
      @endforeach
  </div>
</div>
@stop