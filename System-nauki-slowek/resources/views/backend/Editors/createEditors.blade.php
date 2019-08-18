@extends('backend.layout')

@section('content')
<h1> Redaktorzy</h1>
<div>
    <form action="{{ action('EditorsController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Użytkownik </td>
       <td>
       <select name="users">
    
                @foreach($users as $u)
                    <option value="{{$u->id}}">{{$u->name}}</option>
                 @endforeach
        </select>
        </tr>

        <!--<tr><td>Super redaktor</td><td>  
        <select name="editorsSupereditor">
                    <option value="1">1</option>
                    <option value="0">0</option>
        </select></td> </tr> -->
        <tr><td>Podkategoria: </td>
       <td>
       <select name="subcategories">
    
                @foreach($subcategories as $s)
                    <option value="{{$s->id}}">{{$s->categories->name}}/{{$s->name}}</option>
                 @endforeach
        </select>
        </tr>
    
       
       
        <tr><td></td><td><input type="submit" value="Dodaj redaktora!" class="btn btn-success"></td></tr>
        </table>
    </form>
    
</div>

@endsection