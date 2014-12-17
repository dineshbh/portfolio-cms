@extends('layouts.admin')
@section('content')
{{ link_to_route('admin.users.create', 'Create New User', null, ['class' => 'button']) }}
<h2 class="listings">Users</h2><hr>
<table>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td width = 100%> {{{ $user->username }}}</td>
                {{ Form::model($users, array('action' => ['UserController@destroy', $user->id], 'method' => 'delete')) }}
                <td>{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button']) }}</td> 
                {{ Form::close() }}
            </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}
@stop