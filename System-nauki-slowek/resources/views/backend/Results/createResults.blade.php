@extends('backend.layout')

@section('content')
<h1> Wyniki</h1>
<div>
    <form action="{{ action('ResultsController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Język1: </td>
       <td>
       <select name="sets">
    
                @foreach($sets as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                 @endforeach
        </select>
        </tr>
        <tr><td>Język1: </td>
       <td>
       <select name="users">
    
                @foreach($users as $u)
                    <option value="{{$u->id}}">{{$u->name}}</option>
                 @endforeach
        </select>
        </tr>
        <tr><td>Data</td><td> <input type="text" name="resultsDate" placeholder="data"  ></td> </tr>
       <tr><td>Procent</td><td>  <input type="text" name="resultsPercent" placeholder="procent"  ></td> </tr> 
       
        <tr><td></td><td><input type="submit" value="Dodaj Wynik!" class="btn btn-success"></td></tr>
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection