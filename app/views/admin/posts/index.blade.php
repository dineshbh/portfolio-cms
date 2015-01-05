@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.posts.create', 'Create New Post', null, ['class' => 'button']) }}
<h2 class="post-listings">Post listings</h2><hr>
<table>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td width = 70%>{{link_to_route('admin.posts.show',$post->title,$post->id)}}</td>
                <td width = 30%>{{link_to_route('post_comments','View Comments',$post->id)}}</td>
                <td>{{link_to_action('PostsController@edit','Edit',$post->id,['class' => 'tiny button'])}}</td>
                {{ Form::model($post, array('action' => ['PostsController@destroy', $post->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                {{ Form::close() }}
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}
@stop