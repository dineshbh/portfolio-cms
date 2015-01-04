@extends('layouts.admin')
@section('content')
<h2 class="comment-listings">Comments</h2><hr>
<dl class="tabs">
  <dd>{{link_to_action('CommentController@unapproved', 'To Be approved')}}</dd>
  <dd class=active><a href="#approved">Already approved</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="approved">
        <?php
            $approve = '0'; 
            $button_text = 'Unapprove';
        ?>
        @foreach($commentsapp as $comment)
            @include('admin.partials._admin-comments')
        @endforeach
    </tbody>
</table>
{{$commentsapp->links()}}
  </div>
</div>
@stop