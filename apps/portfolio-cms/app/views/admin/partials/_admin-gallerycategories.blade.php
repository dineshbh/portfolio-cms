        <tr>
            @if ($used == 0)
            <td width = 80%>{{$category->category }}</td>
            
                {{ Form::model($category, array('action' => ['GalleryCategoryController@destroy', $category->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                <td>{{link_to_action('GalleryCategoryController@edit','Edit',$category->id,['class' => 'tiny button'])}}</td>
            @else
            <td width = 90%>{{$category->category }}</td>
            <td>{{link_to_action('GalleryCategoryController@edit','Edit',$category->id,['class' => 'tiny button'])}}</td>
            @endif
            {{ Form::close() }}
        </tr>