@extends('layouts.home')
@section('content')
		<h2>¡Hola! Soy John. Desarrollo páginas webs y monto videos. En esta web se puede ver tanto los proyectos en los que he trabajado como mis últimos pensamientos reflejados en mi blog. ¡Echale un vistazo!</h2>
		<hr>
		
	<div class="large-6 medium-6 columns">
	<h3>Mi último proyecto</h3>
	 <a href="{{ action('ProjectsController@show', $galleryitem->id) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a>
	 <h3>{{ link_to_action('ProjectsController@show', $galleryitem->title, $galleryitem->id) }}</h3>
	 <h6 class="subheader">{{ date('M Y', strtotime($galleryitem->date)) }}</h6>
	</div>

	<div class="large-6 medium-6 columns">
	<h3>Mi último post</h3>
	<h3>{{ link_to_action('BlogController@show', $post->title, $post->id) }}</h3>
	<h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
	 {{ str_limit($post->content, $limit = 800, $end = '...') }}
	</div>

	<hr>

<script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 0,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 4,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseLinear,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 1600,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                $SlideHeight: 130,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 7,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            };

            var jssor_slider1 = new $JssorSlider$("slider", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 940));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>



	<div class="large-12 medium-12 columns">
	<h3>Clientes con quien he trabajado</h3>
	        <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider" style="position: relative; top: 0px; left: 0px; width: 940px; height: 130px; overflow: hidden; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 940px; height: 130px; overflow: hidden;">
        @foreach (glob("img/clientes/*.jpg") as $filename) 
            <div>{{ HTML::image($filename) }}</div>
        @endforeach
        </div>
    </div>
	</div>

	<hr>
	<div class="large-6 medium-6 columns">
	<h3>Tecnologías que ultilizo</h3>
	<p><i class="fi-check"> HTML 5</i></p>
	<p><i class="fi-check"> CSS 3</i></p>
	<p><i class="fi-check"> PHP</i></p>
	<p><i class="fi-check"> MySQL</i></p>
	<p><i class="fi-check"> Laravel</i></p>
	</div>

	<div class="large-6 medium-6 columns">
	<h3>Software que manejo</h3>
	<p><i class="fi-check"> Final Cut Pro</i></p>
	<p><i class="fi-check"> Adobe Photoshop</i></p>
	<p><i class="fi-check"> Adobe Fireworks</i></p>
	<p><i class="fi-check"> Adobe Premiere</i></p>
	<p><i class="fi-check"> Adobe After Effects</i></p>
	<p><i class="fi-check"> Motion</i></p>
	<p><i class="fi-check"> DVD Studio Pro</i></p>
	</div>
@stop
