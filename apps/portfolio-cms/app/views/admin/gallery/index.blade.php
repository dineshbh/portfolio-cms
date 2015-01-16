@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.gallery.create', 'Create New Gallery Item', null, ['class' => 'button']) }}
<h2 class="gallery-listings">Gallery listings</h2><hr>
<table>
    <tbody>
        @foreach($galleryitems as $galleryitem)
            <tr>
                <td width = 30%>{{link_to_action('ProjectsController@show',$galleryitem->title, $galleryitem->id, array('target'=>'_blank'))}}</td>
                    @foreach ($categories as $category)
                    @if ($galleryitem->category_id == $category->id)
                        <td width = 30%>{{ $category->category }} </td>
                    @endif
                @endforeach
                <td width = 30%>{{ $galleryitem->image_link }} </td>
                <td>{{link_to_action('GalleryController@edit','Edit',$galleryitem->id,['class' => 'tiny button'])}}</td>
                {{ Form::model($galleryitem, array('action' => ['GalleryController@destroy', $galleryitem->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                {{ Form::close() }}
            </tr>
        @endforeach
    </tbody>
</table>
{{$galleryitems->links()}}
@stop