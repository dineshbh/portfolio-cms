<!-- Footer -->
<footer class="footer">
  <div class="row full-width">
  <hr/>
    <div class="small-6 medium-6 large-6 text-left columns">
      <h4>Explorar</h4>
      <ul class="footer-links">
        <a href="{{ action('HomeController@index') }}">Inicio</a> | <a href="{{ action('ProjectsController@index') }}">Proyectos</a> | <a href="{{ action('BlogController@index') }}">Blog</a> | <a href="{{ action('ContactController@getContact') }}">Contacto</a></li>
      <ul>
    </div>
    <div class="small-6 medium-6 large-6 text-right columns">
      <h4>Sigueme</h4>

      <ul class="footer-links">
      <li><a href="https://github.com/johnmcl81"><i class="fi-social-github"></i></a></li>
      <li><a href="https://www.facebook.com/j.d.mclachlan"><i class="fi-social-facebook"></i></a></li>
      <li><a href="https://twitter.com/john_mclachlan"><i class="fi-social-twitter"></i></a></li>
      <li><a href="https://es.linkedin.com/in/johnmclachlan"><i class="fi-social-linkedin"></i></a></li>
      <ul>
    </div>
  </div>
</footer>              