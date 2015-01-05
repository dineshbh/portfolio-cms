@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.gallery.create', 'Create New Gallery Item', null, ['class' => 'button']) }}
<h2 class="gallery-listings">Gallery listings</h2><hr>
<table>
    <tbody>
        @foreach($images as $image)
            <tr>
                <td width = 40%>{{ 'image url goes here'}}</td>
                <td width = 30%>{{ 'link goes here' }} </td>
                <td width = 30%>{{ 'text goes here' }} </td>
                <td>{{link_to_action('GalleryController@edit','Edit',$image->id,['class' => 'tiny button'])}}</td>
                {{ Form::model($post, array('action' => ['GalleryController@destroy', $post->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                {{ Form::close() }}
            </tr>
        @endforeach
    </tbody>
</table>
{{$images->links()}}
@stop