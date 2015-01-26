@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.gallery.create', 'Create New Gallery Item', null, ['class' => 'button']) }}
<h2 class="gallery-listings">Gallery listings</h2><hr>
<table>
    <tbody>
        @foreach($galleryitems as $galleryitem)
            <tr>
                <td width = 20%><a href="{{ action('ProjectsController@show', $galleryitem->id) }}">{{ HTML::image($galleryitem->image_url, $galleryitem->image_link, array('class' => 'thumb'))}}</a></td>
                <td width = 30%>{{link_to_action('ProjectsController@show',$galleryitem->title, $galleryitem->id, array('target'=>'_blank'))}}</td>
                    @foreach ($categories as $category)
                    @if ($galleryitem->category_id == $category->id)
                        <td width = 30%>{{ $category->category }} </td>
                    @endif
                @endforeach
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