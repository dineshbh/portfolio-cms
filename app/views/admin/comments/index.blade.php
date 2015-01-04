@extends('layouts.admin')
@section('content')
<?php
  if (isset($_GET['approved']) AND $_GET['approved']==1) {
    $approved = 1;
    $button_text = 'Unapprove';
    $comments = $commentsapp;
  } else {
    $approved = 0;
    $button_text = 'Approve';
    $comments = $commentsunapp;
  }
 ?> 
<h2 class="comment-listings">All Comments</h2><hr>
<dl class="tabs">
  @if ($approved == 0)
    <dd class=active><a href="#">To be approved</a></dd>
    <dd>
    {{ link_to_action('CommentController@index', 'Already Approved', array('approved' => '1')) }}
    </dd>
  @else
    <dd>
    {{ link_to_action('CommentController@index', 'To be Approved', array('approved' => '0'))  }}
    </dd>
    <dd class=active><a href="#">Already Approved</a></dd>
  @endif
</dl>
<div class="tabs-content">
  <div class="content active">
  @if ($comments->count())
        @foreach($comments as $comment)
            @include('admin.partials._admin-comments')
        @endforeach
        </tbody>
</table>
  @else
    <p>No comments found<p>
  @endif
{{$comments->links()}}
  </div>
</div>
@stop