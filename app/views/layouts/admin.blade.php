<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard - John McLachlan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Uses laravel facade to add scripts and css
        with the correctr root relative paths -->
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/foundation.css') }}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::script('js/vendor/modernizr.js')}}
        {{ HTML::script('js/ckeditor/ckeditor.js')}}
		
</head>
<body>
  
  <div class="row">
    <div class="large-3 columns">
      <h1>Dashboard</h1>
    </div>

    <div class="large-9 columns">
        @include('admin.partials._admin-login') 
    </div>
  </div>

  <div class="row">     
    <div class="large-9 push-3 columns">
        @if (Session::has('message'))
        <div class="alert-box success">
            {{{ Session::get('message') }}}
        </div>
      @endif
      @yield('content')  
    </div>
    
    <div class="large-3 pull-9 columns">
        @include('admin.partials._admin-nav') 
    </div>

  </div>
   
  <footer class="row">
      @include('admin.partials._admin-footer') 
  </footer>
  
    {{ HTML::script('js/vendor/jquery.js')}}
    {{ HTML::script('js/foundation.min.js')}}
    {{ HTML::script('js/app.js')}}
    <script>
      $(document).foundation();
    </script>

</body>
</html>