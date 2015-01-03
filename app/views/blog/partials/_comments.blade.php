<div id="respond">

  <h3>Leave a Comment</h3>
  <form action="post_comment.php" method="post" id="commentform">

    <label for="comment_author" class="required">Your name</label>
    <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

    <label for="email" class="required">Your email;</label>
    <input type="email" name="email" id="email" value="" tabindex="2" required="required">

    <label for="comment" class="required">Your message</label>
    <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

    <!-- comment_post_ID value hard-coded as 1 -->
    <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
    <input name="submit" type="submit" value="Submit comment" />

  </form>

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