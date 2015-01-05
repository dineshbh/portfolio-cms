@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.gallery.create', 'Create New Gallery Item', null, ['class' => 'button']) }}
<h2 class="gallery-listings">Gallery listings</h2><hr>
<table>
    <tbody>
        @foreach($images as $image)
            <tr>
                <td width = 30%>{{ $image->title }}</td>
                    @foreach ($categories as $category)
                    @if ($image->category_id == $category->id)
                        <td width = 30%>{{ $category->category }} </td>
                    @endif
                @endforeach
                <td width = 30%>{{ $image->image_link }} </td>
                <td>{{link_to_action('GalleryController@edit','Edit',$image->id,['class' => 'tiny button'])}}</td>
                {{ Form::model($image, array('action' => ['GalleryController@destroy', $image->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                {{ Form::close() }}
            </tr>
        @endforeach
    </tbody>
</table>
{{$images->links()}}
@stop