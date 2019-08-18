@extends('backend.layout')

@section('content')
<h1> Role</h1>
<div>
    <form action="{{ action('RolesController@update', $roles->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="rolesName" placeholder="Nazwa" value="{{ $roles->name }}" ></td> </tr>
       <tr><td>Opis: </td><td>  <input type="text" name="rolesDescription" placeholder="Opis" value="{{ $roles->description }}" ></td> </tr> 
       <tr><td></td><td>  <input type="submit" value="Edytuj rolę!" class="btn btn-success"></td> </tr>
      
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection