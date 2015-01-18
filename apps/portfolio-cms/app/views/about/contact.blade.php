@extends('layouts.home')
@section('content')
<div class="large-6 medium-6 columns">
<h3>Hi!</h3>
<p>He trabajado en el Reino Unido en una variedad de proyectos audiovisuales durante un periodo de más de 2 años. Incluyendo un año y medio como el editor principal una productura, montada por el que fue el director regional de la BBC. Desde televisión hasta la víseos corporativos. He tenido experiencia trabajando en cada una de las etapas del proceso de producción, incluyendo investigación, desarrollo, guión, rodajes, edición en línea y fuera de línea y creación de menús de DVD.</p>

<p>Combinando mi conocimiento sobre software de gráficas y edición para desarrollar videos innovadores y creativos adaptados a cualquiera que sea el tipo de audiencia, ya sea audiencia televisiva o de producciones corporativas. En junio del 2008 obtuve el título de más alto nivel de Apple Certified Pro en Final Cut Pro.</p>

<p>También tengo experiencia con gráficos animados, edición de audio, creación de DVDs y diseño web. Además tengo experiencia como operador de cámara. y auxiliar en programas de televisión y eventos.</p>

<p>Estuve mas de 2 años en España trabajando en una productora especializada en videos y campañas online. Aquí he ampliado más mi experiencia y conocmiento del mundo de video online. Últimamente trabajo en videos virales, diseño de blogs, vídeos corporatovos y gestión de campañas de marketing online y posicionamiento web.</p>

<p>Cuento con una gran variedad de conocimientos técnicos, al igual que ideas creativas. Mis títulos en audiovisuales pueden encontrarse en la sección de 'formación' y una selección de los diversos proyectos en que he trabajado durante a lo largo de los años en la sección 'proyectos'.</p>
</div>
<div class="large-6 medium-6 columns">
<h3>Contact Me</h3>
{{ Form::open( array ('action' => 'ContactController@getContactUsForm')) }}
@if (Session::has('message'))
  <div class="alert-box success">
  {{{ Session::get('message') }}}
  </div>
@endif
@foreach($errors->all('
:message
') as $message) {{ $message }} @endforeach

{{ Form:: label ('first_name', 'First Name*' )}}
{{ Form:: text ('first_name', '' )}}

{{ Form:: label ('last_name', 'Last Name*' )}}
{{ Form:: text ('last_name', '' )}}

{{ Form:: label ('email', 'E-mail Address*') }}
{{ Form:: email ('email', '', array('placeholder' => 'me@example.com')) }}

{{ Form:: label ('subject', 'Subject') }}
{{ Form:: text ('subject', '' )}}

{{ Form:: label ('message', 'Message*' )}}
{{ Form:: textarea ('message', '')}}

{{ Form::reset('Clear', array('class' => 'you css class for button')) }}
{{ Form::submit('Send', array('class' => 'you css class for button')) }}

{{ Form:: close() }}
</div>
@stop