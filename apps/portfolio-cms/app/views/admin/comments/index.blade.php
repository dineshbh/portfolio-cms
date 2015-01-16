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

@if (isset($getByPost) AND $getByPost == 1)
  @foreach ($posts as $post)
    <h2 class="comment-listings">Comments for '{{$post->title}}'</h2><hr>
  @endforeach
  @else
    <?php $getByPost = 0; ?> 
    <h2 class="comment-listings">All Comments</h2><hr>
  @endif


<dl class="tabs">
  @if ($approved == 0)
    <dd class=active><a href="#">To be approved</a></dd>
    <dd>
    @if ($getByPost == 1)
      @foreach ($posts as $post)
        {{ link_to_route('post_comments', 'Already Approved', array('approved' => '1', 'id' => $post->id)) }}
      @endforeach
    @else
      {{ link_to_action('CommentController@index', 'Already Approved', array('approved' => '1')) }}
    @endif
    </dd>
  @else
    <dd>
    @if ($getByPost == 1)
      {{ link_to_route('post_comments', 'To be Approved', array('approved' => '0', 'id' => $post->id))  }}
    @else
      {{ link_to_action('CommentController@index', 'To be Approved', array('approved' => '0'))  }}
    @endif
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
{{$comments->appends(array('approved' => $approved))->links()}}
  </div>
</div>
@stop