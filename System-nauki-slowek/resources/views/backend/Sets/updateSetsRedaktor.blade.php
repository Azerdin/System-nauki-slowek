@extends('backend.layout')

@section('content')
<h1> Zestaw</h1>

<div>
    <form action="{{ action('SetsController@update', $sets->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="setsName" placeholder="Nazwa" value="{{ $sets->name }}" ></td> </tr>
       <tr><td>Słowa: </td><td>  <textarea name="setsWords" placeholder="słowa">{{ $sets->words }}</textarea></td> </tr> 
       <tr><td>Liczba słów:</td><td>  <input type="text" name="setsNumber_of_words"  value="{{ $sets->number_of_words }}" ></td> </tr>
       <tr><td>Język1: </td>
       <td>
       <select name="languages1">
                @foreach($languages as $l)
                    @if($l->id == $sets->languages1->id)
                        <option selected value="{{$l->id}}">{{$l->name}}</option>
                    @else
                        <option value="{{$l->id}}">{{$l->name}}</option>
                    @endif
                 @endforeach
        </select>
            </td>
            <tr><td>Język2: </td>
       <td>
       <select name="languages2">
                @foreach($languages as $l)
                    @if($l->id == $sets->languages2->id)
                        <option selected value="{{$l->id}}">{{$l->name}}</option>
                    @else
                        <option value="{{$l->id}}">{{$l->name}}</option>
                    @endif
                 @endforeach
        </select>
            </td>
            <tr><td>Podkategoria: </td>
       <td>
       <select name="subcategories">
            @for($i=0 ; $i<count($editors); $i++)
                @for($j=0; $j<count($subcategories); $j++)
                    @if($editors[$i]->subcategories_id == $subcategories[$j]->id)
                        @if($subcategories[$j]->id == $sets->subcategories->id)
                            <option selected value="{{$subcategories[$j]->id}}">{{$subcategories[$j]->categories->name}}/{{$subcategories[$j]->name}}</option>
                        @else
                            <option value="{{$subcategories[$j]->id}}">{{$subcategories[$j]->categories->name}}/{{$subcategories[$j]->name}}</option>
                        @endif
                    @endif
                 @endfor
            @endfor
        </select>
            </td>
       
       <tr><td></td><td>  <input type="submit" value="Edytuj zestaw!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection