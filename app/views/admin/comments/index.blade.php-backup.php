@extends('layouts.admin')
@section('content')
<h2 class="comment-listings">Comments</h2><hr>
<?php 
    if (isset($_GET['tab'])) {
       $tab = $_GET['tab']; 
   }
    else
   {
        $tab = 1;
   }
 ?>

<dl class="tabs" data-tab>
  <dd <?php if ($tab == 1) { echo 'class=active';} ?>><a href="#to_approve">To be approved</a></dd>
  <dd <?php if ($tab == 2) { echo 'class=active';} ?>><a href="#approved">Already approved</a></dd>
</dl>
<div class="tabs-content">
  <div class="content <?php if ($tab == 1) { echo 'active';} ?>" id="to_approve">
    <?php
        $approve = '1'; 
        $button_text = 'Approve';
    ?>
        @foreach($commentsunapp as $comment)
            @include('admin.partials._admin-comments')
        @endforeach
        </tbody>
</table>
{{$commentsunapp->appends(array('tab' => '1'))->links()}}
  </div>
  <div class="content <?php if ($tab == 2) { echo 'active';} ?>" id="approved">
    {{$commentsunapp->links()}}
        <?php
            $approve = '0'; 
            $button_text = 'Unapprove';
        ?>
        @foreach($commentsapp as $comment)
            @include('admin.partials._admin-comments')
        @endforeach
    </tbody>
</table>
{{$commentsapp->appends(array('tab' => '2'))->links()}}
  </div>
</div>
@stop