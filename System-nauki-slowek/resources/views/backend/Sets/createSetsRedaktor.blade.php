@extends('backend.layout')

@section('content')
<h1> Zestaw</h1>
<div>
    <form action="{{ action('SetsController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Nazwa:</td><td> <input type="text" name="setsName" placeholder="nazwa"></td> </tr>
       <tr><td>Słowa: </td><td>  <textarea name="setsWords" placeholder="słowa" ></textarea></td> </tr> 
       <tr><td>Liczba słów:</td><td>  <input type="text" name="setsNumber_of_words" ></td> </tr>
       <tr><td>Język1: </td>
       <td>
       <select name="languages1">
    
                @foreach($languages as $l)
                    <option value="{{$l->id}}">{{$l->name}}</option>
                 @endforeach
        </select>
        </tr>
        <tr><td>Język2: </td>
       <td>
       <select name="languages2">
    
                @foreach($languages as $l)
                    <option value="{{$l->id}}">{{$l->name}}</option>
                 @endforeach
        </select>
        </tr>
        <tr><td>Podkategoria: </td>
       <td>
       <select name="subcategories">
    
                @for($i=0 ; $i<count($editors); $i++)
                    @for($j=0; $j<count($subcategories); $j++)
                    @if($editors[$i]->subcategories_id == $subcategories[$j]->id)
                    <option value="{{$subcategories[$j]->id}}">{{$subcategories[$j]->categories->name}}/{{$subcategories[$j]->name}}</option>
                    @endif
                    @endfor
                 @endfor
        </select>
        </tr>
        <tr><td></td><td><input type="submit" value="Dodaj zestaw!" class="btn btn-success"></td></tr>
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection