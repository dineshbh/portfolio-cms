<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>John McLachlan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Uses laravel facade to add scripts and css
        with the correctr root relative paths -->
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/foundation.css') }}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::script('js/vendor/modernizr.js')}}
        {{ HTML::style('foundation-icons/foundation-icons.css')}}
		
</head>
<body>
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
  
    {{ HTML::script('js/vendor/jquery.js')}}
    {{ HTML::script('js/foundation.min.js')}}
    <script>
      $(document).foundation();
    </script>

</body>
</html>
