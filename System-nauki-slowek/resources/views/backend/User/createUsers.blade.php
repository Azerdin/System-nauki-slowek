@extends('backend.layout')

@section('content')
<h1> Użytkownicy </h1>
<div class="content">

    <form action="{{ action('UsersController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Nazwa:</td><td> <input type="text" name="usersName" placeholder="nazwa" ></td> </tr>
       <tr><td>E-mail: </td><td>  <input type="text" name="usersEmail" placeholder="hasło" ></td> </tr> 
       <tr><td>Rola: </td></tr>
       @foreach($roles as $r)
       <tr><td> <input type="checkbox" name="roles[]" value="{{$r->id}}">{{$r->name}}</td></tr>
       @endforeach
        <tr><td></td><td><input type="submit" value="Dodaj użytkownika!" class="btn btn-success"></td></tr>
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection