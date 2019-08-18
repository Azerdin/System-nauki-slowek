@extends('backend.layout')

@section('content')


<div class="content">
    <h1> Użytkownicy </h1>
    <form action="{{ action('UsersController@update', $users->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="usersName" placeholder="Nazwa" value="{{ $users->name }}" ></td> </tr>
       <tr><td>E-mail: </td><td>  <input type="text" name="usersEmail" placeholder="E-mail" value="{{ $users->email }}" ></td> </tr> 
       <tr><td>Role:</td><td>
        
       
    @foreach($roles as $r)
        @foreach($users->roles as $role)
         @if($role->pivot->roles_id == $r->id)
            <tr><td></td><td> <input type="checkbox" name="roles[]" value="{{$r->id}}" checked>{{$r->name}}</td></tr>
            @break
        @elseif($role->pivot->roles_id != $r->id && $loop->last)
        <tr><td></td><td> <input type="checkbox" name="roles[]" value="{{$r->id}}" >{{$r->name}}</td></tr>
         @endif
        @endforeach
       @endforeach

       <tr><td></td><td>  <input type="submit" value="Edytuj użytkownika!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>
@endsection