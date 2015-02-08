<div id="respond">
@if (Session::has('message'))
  <div class="alert-box success">
  {{{ Session::get('message') }}}
  </div>
@endif
  <h3>Deja un comentario</h3>
  {{ Form::open( array ('action' => 'BlogController@store')) }}
  <div class="row">
    <div class="large-6 columns">
      {{ Form::label('Name') }}
      {{ Form::text('commenter') }}
    </div>
    <div class="large-6 columns">
      {{ Form::label('email') }}
      {{ Form::text('email') }}
    </div>
    <div class="large-12 columns">
      {{ Form::label('comment') }}
      {{ Form::textarea('comment', null, ['size' => '30x5']) }}
      <script type="text/javascript">
        CKEDITOR.replace( 'comment', {
          resize_enabled: false,
          removePlugins: 'toolbar,elementspath',
          removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image',
        } );
      </script>
      {{ Form::hidden('post_id', $post->id) }}
      {{ Form::submit('Create', array('class' => 'button')) }}
      {{ Form::close() }}
    </div>
  </div>
</div>

<ol id="posts-list">
  @if ($comments->isEmpty())
  <li class="no-comments">Ser el primero en comentar.</li>
  @else
    @foreach ($comments as $comment)
      <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">  
        <footer class="post-info">
          <address class="vcard author">
          <?php
          $email = $comment->email;
          $path = "http://www.gravatar.com/avatar/".md5($email);
          $default = "mm";
          $size = 40;
          ?>
           <img src="<?php echo $path?>/?d=<?php echo $default?>&s=<?php $size; ?>"/>
          </address>
        </footer>

        <div class="entry-content">
        <a class="url fn" href="#"><?php echo($comment['commenter']); ?></a> said on 
        {{{ date('d F Y', strtotime($comment['created_at'])) }}} at 
        {{{ date("g:i", strtotime($comment->created_at)) }}}
          <p><?php echo($comment['comment']); ?></p>
        </div>
      </article>
      </li>
    @endforeach
    @endif
</ol>