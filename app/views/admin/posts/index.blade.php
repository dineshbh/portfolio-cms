@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.posts.create', 'Create New Post', null, ['class' => 'success button']) }}
<h2 class="post-listings">Post listings</h2><hr>
<table>
    <thead>
    <tr>
        <th width="300">Post Title</th>
        <th width="120">Post Edit</th>
        <th width="120">Post Delete</th>
        <th width="120">Post View</th>
    </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{HTML::linkRoute('admin.posts.edit','Edit',$post->id)}}</td>
                <td>{{HTML::linkRoute('admin.posts.destroy','Delete',$post->id)}}</td>
                <td>{{HTML::linkRoute('admin.posts.show','View',$post->id,['target'=>'_blank'])}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}
@stop