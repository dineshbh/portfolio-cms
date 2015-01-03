<div id="respond">
@if (Session::has('message'))
  <div class="alert-box success">
  {{{ Session::get('message') }}}
  </div>
@endif
  <h3>Leave a Comment</h3>
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
      {{ Form::hidden('post_id', $post->id) }}
      {{ Form::submit('Create', array('class' => 'button')) }}
      {{ Form::close() }}
    </div>
  </div>
</div>

<ol id="posts-list">
  @if ($comments->isEmpty())
  <li class="no-comments">Be the first to add a comment.</li>
  @else
    @foreach ($comments as $comment)
      <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">  
        <footer class="post-info">
          <address class="vcard author">
           <img src="http://placehold.it/100x100">
          </address>
        </footer>

        <div class="entry-content">
        <a class="url fn" href="#"><?php echo($comment['commenter']); ?></a> said on 
        {{{ date('d F Y', strtotime($comment['created_at'])) }}}
          <p><?php echo($comment['comment']); ?></p>
        </div>
      </article>
      </li>
    @endforeach
    @endif
</ol>