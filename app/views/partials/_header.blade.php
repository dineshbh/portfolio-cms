    <div class="large-12 columns header">
      <div class="nav-bar right">
       <ul class="button-group">
       <!-- uses currentRouteName() to get the route name of the current url then uses strpos to find out if the route name contains a string, then makes that button active -->
         <li><a class={{ strpos(Route::currentRouteName(), 'home') == 'true' ? '"button active"' : '"button"' }} href="{{ action('HomeController@index') }}">HOME</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'project') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ProjectsController@index') }}">PROJECTS</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'blog') == 'true' ? '"button active"' : '"button"' }} href="{{ action('BlogController@index') }}">BLOG</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'about') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ContactController@getContact') }}">ABOUT</a></li>
        </ul>
      </div>
      <h1>{{ link_to('/', 'John McLachlan') }}</h1>
    </div>
     <hr/>