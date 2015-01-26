@extends('layouts.home')
@section('content')
<div class="large-6 medium-6 columns">
<h3>Un poco sobre mi</h3>

<p>Cuento con una gran variedad de conocimientos tecnicos, tanto lenguages de desarollo web como HTML, CSS, PHP y MySQL como software de post-producción de video como Final Cut Pro.</p>

<p>Recientemente he dessarollado un CMS ultizando el framework de PHP avanzado, 'Laravel'. Estoy comodo trabajando con el LAMP stack a manejando bases de datos a traverse de MySQL y PHP para crear applicaciones webs dynamics y responsivas.</p>

<p>Estuve mas de 2 años trabajando en una productora española especializada en videos y campañas online. Alli  amplié más mi experiencia y conocmiento del mundo de video online.</p>

<p>En el Reino Unido trabajaba en una variedad de proyectos audiovisuales durante un periodo de más de 2 años. Incluyendo un año y medio como el editor principal una productura, montada por el que fue el director regional de la BBC. Desde televisión hasta la víseos corporativos.</p>

<p>También tengo experiencia con gráficos animados, edición de audio, creación de DVDs y diseño web. Además tengo experiencia como operador de cámara. y auxiliar en programas de televisión y eventos.</p>



</div>
<div class="large-6 medium-6 columns">
<h3>Contactame</h3>
{{ Form::open( array ('action' => 'ContactController@getContactUsForm')) }}
@if (Session::has('message'))
  <div class="alert-box success">
  {{{ Session::get('message') }}}
  </div>
@endif
@foreach($errors->all('
:message
') as $message) {{ $message }} @endforeach

{{ Form:: label ('first_name', 'Nombre*' )}}
{{ Form:: text ('first_name', '' )}}

{{ Form:: label ('last_name', 'Apellidos*' )}}
{{ Form:: text ('last_name', '' )}}

{{ Form:: label ('email', 'E-mail*') }}
{{ Form:: email ('email', '', array('placeholder' => 'yo@email.com')) }}

{{ Form:: label ('subject', 'Asunto') }}
{{ Form:: text ('subject', '' )}}

{{ Form:: label ('message', 'Mensaje*' )}}
{{ Form:: textarea ('message', '')}}

{{ Form::reset('Limpiar', array('class' => 'you css class for button')) }}
{{ Form::submit('Enviar', array('class' => 'you css class for button')) }}

{{ Form:: close() }}
</div>
@stop