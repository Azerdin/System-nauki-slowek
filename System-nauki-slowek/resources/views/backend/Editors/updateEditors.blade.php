@extends('backend.layout')

@section('content')
<h1> Redaktorzy</h1>
<div>
    <form action="{{ action('EditorsController@update', $editors->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
        <tr><td>Użytkownik: </td>
       <td>
       <select name="users">
                @foreach($users as $u)
                    @if($u->id == $editors->users->id)
                        <option selected value="{{$u->id}}">{{$u->name}}</option>
                    @else
                        <option  value="{{$u->id}}">{{$u->name}}</option>
                    @endif
                 @endforeach
        </select>
       </td>
       <!--<tr><td>Super redaktor</td><td>  
        <select name="editorsSupereditor">
            @if($editors->supereditor == 1)
                    <option value="1" selected>1</option>
                    <option value="0">0</option>
            @else
                <option value="1">1</option>
                    <option value="0" selected>0</option>
            @endif
        </select></td> </tr> -->
       <tr><td>Podkategoria: </td>
       <td>
       <select name="subcategories">
                @foreach($subcategories as $s)
                    @if($s->id == $editors->subcategories->id)
                        <option selected value="{{$s->id}}">{{$s->categories->name}}/{{$s->name}}</option>
                    @else
                        <option value="{{$s->id}}">{{$s->categories->name}}/{{$s->name}}</option>
                    @endif
                 @endforeach
        </select>
            </td>
       
       <tr><td></td><td>  <input type="submit" value="Edytuj redaktora!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    
</div>

@endsection