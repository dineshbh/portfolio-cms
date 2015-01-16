<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - Portfolio CMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Uses laravel facade to add scripts and css
        with the correctr root relative paths -->
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/foundation.css') }}
        {{ HTML::style('foundation-icons/foundation-icons.css')}}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::script('js/vendor/modernizr.js')}}	
</head>
<body>

  <div class="row">
    <div class="large-6 medium-6 small-8 columns large-centered medium-centered small-centered auth-plain">
        @if (Session::has('message'))
          <div class="alert-box success">
            {{{ Session::get('message') }}}
          </div>
         @endif
        <p>Please Log In</p>
        {{ Form::open( array ('action' => 'AdminController@postLogin')) }}
          <div class="row collapse">

            <div class="small-2  columns">
              <span class="prefix"><i class="fi-torso"></i></span>
            </div>
            <div class="small-10  columns">
              {{ Form::text('username', Input::old('username'),  array('placeholder'=>'Username')) }}
            </div>
            {{ $errors->first('username', '<small class="error">:message</small>'); }}
          </div>
          <div class="row collapse">
            <div class="small-2 columns ">
              <span class="prefix"><i class="fi-lock"></i></span>
            </div>
            <div class="small-10 columns ">
              {{ Form::password('password', array('placeholder'=>'Password')) }}
            </div>
            {{ $errors->first('password', '<small class="error">:message</small>'); }}
          </div>
          {{ Form::submit('Log In', array('class' => 'button')) }}
        {{ Form::close() }}
    </div>
   </div>

  
    {{ HTML::script('js/vendor/jquery.js')}}
    {{ HTML::script('js/foundation.min.js')}}
    <script>
      $(document).foundation();
    </script>

</body>
</html>


