    <div class="large-12 columns header">
    <div class"row">
      <div class="nav-bar right hide-for-small">
       <ul class="button-group hide-for-small">
       <!-- uses currentRouteName() to get the route name of the current url then uses strpos to find out if the route name contains a string, then makes that button active -->
         <li><a class={{ strpos(Route::currentRouteName(), 'home') == 'true' ? '"button active"' : '"button"' }} href="{{ action('HomeController@index') }}">HOME</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'project') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ProjectsController@index') }}">PROJECTS</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'blog') == 'true' ? '"button active"' : '"button"' }} href="{{ action('BlogController@index') }}">BLOG</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'about') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ContactController@getContact') }}">ABOUT</a></li>
        </ul>
      </div>
      <h1 class="hide-for-small">{{ link_to('/', 'John McLachlan') }}</h1>
    </div>
      <div class="mobile show-for-small">
      <h1 class="mobile">{{ link_to('/', 'John McLachlan') }}</h1>
      <div class="nav-bar mobile">
       <ul class="button-group">
       <!-- uses currentRouteName() to get the route name of the current url then uses strpos to find out if the route name contains a string, then makes that button active -->
         <li><a class={{ strpos(Route::currentRouteName(), 'home') == 'true' ? '"button active"' : '"button"' }} href="{{ action('HomeController@index') }}">HOME</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'project') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ProjectsController@index') }}">PROJECTS</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'blog') == 'true' ? '"button active"' : '"button"' }} href="{{ action('BlogController@index') }}">BLOG</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'about') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ContactController@getContact') }}">ABOUT</a></li>
        </ul>
      </div>
    </div>
    <div>
     <hr/>