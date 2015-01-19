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
        {{ HTML::style('foundation-icons/foundation-icons.css')}}
        <link href='http://fonts.googleapis.com/css?family=Poiret+One|Josefin+Sans:300,400,700,300italic,400italic,700italic|Lobster' rel='stylesheet' type='text/css'>      
        
</head>
<body>
 
  <div class="row">
    <div class="large-12 columns" role="content">
        @yield('content')
    </div>
 </div>
    
    <script>
      $(document).foundation();
    </script>
</body>
</html>
