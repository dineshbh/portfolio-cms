@extends('layouts.admin')
@section('content')
<h2 class="comment-listings">Comments</h2><hr>
<dl class="tabs">
  <dd class=active><a href="#to_approve">To be approved</a></dd>
  <dd>{{link_to_action('CommentController@approved', 'Already Approved')}}</dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="to_approve">
    <?php
        $approve = '1'; 
        $button_text = 'Approve';
    ?>
        @foreach($commentsunapp as $comment)
            @include('admin.partials._admin-comments')
        @endforeach
        </tbody>
</table>
{{$commentsunapp->links()}}
  </div>
</div>
@stop