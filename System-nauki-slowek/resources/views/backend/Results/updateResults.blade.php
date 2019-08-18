@extends('backend.layout')

@section('content')
<h1> Wyniki</h1>

<div>
    <form action="{{ action('ResultsController@update', $results->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
        <tr><td>Set: </td>
       <td>
       <select name="sets">
                @foreach($sets as $s)
                    @if($s->id == $results->sets->id)
                        <option selected value="{{$s->id}}">{{$s->name}}</option>
                    @else
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endif
                 @endforeach
        </select>
       </td>
       <tr><td>Użytkownik: </td>
       <td>
       <select name="users">
                @foreach($users as $u)
                    @if($u->id == $results->users->id)
                        <option selected value="{{$u->id}}">{{$u->name}}</option>
                    @else
                        <option value="{{$u->id}}">{{$u->name}}</option>
                    @endif
                 @endforeach
        </select>
            </td>
       <tr><td>Data:</td><td> <input type="text" name="resultsDate" placeholder="Data" value="{{ $results->name }}" ></td> </tr>
       <tr><td>Procent: </td><td>  <input type="text" name="resultsPercent" placeholder="Procent" value="{{ $results->words }}" ></td> </tr> 
       <tr><td></td><td>  <input type="submit" value="Edytuj Wynik!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection