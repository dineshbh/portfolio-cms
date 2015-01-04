<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>John McLachlan | Portfolio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Uses laravel facade to add scripts and css
        with the correctr root relative paths -->
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/foundation.css') }}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::style('css/portfolio.css') }}
        {{ HTML::script('js/vendor/modernizr.js')}}
        {{ HTML::script('js/ckeditor/ckeditor.js')}}
        {{ HTML::style('foundation-icons/foundation-icons.css')}}
        <link href='http://fonts.googleapis.com/css?family=Nixie+One|Chicle|Cabin:400,700,400italic,700italic|Londrina+Solid|Stalemate|Poiret+One|Lily+Script+One|Cabin+Condensed:400,700|Petrona|Wire+One|Josefin+Sans:300,400,700,300italic,400italic,700italic|Lobster|Engagement|Josefin+Slab:300,400,700,300italic,700italic|Great+Vibes|Gruppo|Italianno|Kranky|Pacifico|Sacramento|Lobster+Two:400,400italic,700,700italic|Londrina+Shadow|Megrim|Oswald:400,700,300|Righteous|VT323' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="row">
  <div class="row">
    @include('blog.partials._header') 
  </div>
 
  <div class="row">
    <div class="large-9 columns" role="content">
        @yield('content')
    </div>
  
 
 <aside class="large-3 columns">
  @include('blog.partials._sidebar')   
 </aside>
 </div>
  
    @include('blog.partials._footer') 
    </div>
  
    {{ HTML::script('js/vendor/jquery.js')}}
    {{ HTML::script('js/foundation.min.js')}}
    <script>
      $(document).foundation();
    </script>

</body>
</html>
