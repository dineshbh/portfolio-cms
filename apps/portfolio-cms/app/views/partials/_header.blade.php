    <div class="large-12 show-for-medium-up columns header">
    <div class"show-for-medium-up">
      <div class="nav-bar right show-for-medium-up">
       <ul class="button-group show-for-medium-up">
       <!-- uses currentRouteName() to get the route name of the current url then uses strpos to find out if the route name contains a string, then makes that button active -->
         <li><a class={{ strpos(Route::currentRouteName(), 'home') == 'true' ? '"button active"' : '"button"' }} href="{{ action('HomeController@index') }}">INICIO</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'project') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ProjectsController@index') }}">PROYECTOS</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'blog') == 'true' ? '"button active"' : '"button"' }} href="{{ action('BlogController@index') }}">BLOG</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'about') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ContactController@getContact') }}">CONTACTO</a></li>
        </ul>
      </div>
      <h1 class="show-for-medium-up">{{ link_to('/', 'John McLachlan') }}</h1>
    </div>
    </div>
      <div class="mobile show-for-small">
      <h1 class="mobile">{{ link_to('/', 'John McLachlan') }}</h1>
      <div class="nav-bar mobile">
       <ul class="button-group">
       <!-- uses currentRouteName() to get the route name of the current url then uses strpos to find out if the route name contains a string, then makes that button active -->
         <li><a class={{ strpos(Route::currentRouteName(), 'home') == 'true' ? '"button active"' : '"button"' }} href="{{ action('HomeController@index') }}">INICIO</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'project') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ProjectsController@index') }}">PROYECTOS</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'blog') == 'true' ? '"button active"' : '"button"' }} href="{{ action('BlogController@index') }}">BLOG</a></li>
         <li><a class={{ strpos(Route::currentRouteName(), 'about') == 'true' ? '"button active"' : '"button"' }} href="{{ action('ContactController@getContact') }}">CONTACTO</a></li>
        </ul>
      </div>
    </div>
     <hr/>