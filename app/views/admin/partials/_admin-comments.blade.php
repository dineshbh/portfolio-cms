<table width = 100%>
    <tbody>
        <tr>
            <th>
                {{ 'comment' }}
            </th>
            <th>
                {{ 'post' }}
            </th>
            <th colspan="2">
                {{ 'actions' }}
            </th>
        </tr>
	<tr>
    <td width =80%>
        {{ $comment->commenter }} said on {{ date("jS M Y", strtotime($comment->created_at)) }} at {{ date("g:i", strtotime($comment->created_at)) }}<br/>
        {{ $comment->comment }}
        </td>
    @foreach($posts as $post)
        @if ($comment->post_id == $post->id)
            <td width = 20%>{{link_to_route('admin.posts.show',$post->title,$post->id)}}</td>
        @endif
    @endforeach
    <td>
    {{ Form::model($comment, array('action' => ['CommentController@approve', $comment->id], 'method' => 'PUT')) }}
    {{ Form::hidden('approved', $approved) }}
    {{ Form::submit($button_text, array('class' => 'tiny button')) }}
    {{ Form::close() }}
    </td>

    <td>
    {{ Form::model($comment, array('action' => ['CommentController@destroy', $comment->id], 'method' => 'delete')) }}
    {{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}
    {{ Form::close() }}
    </td> 
</tr>