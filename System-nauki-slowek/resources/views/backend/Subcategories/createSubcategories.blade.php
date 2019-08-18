@extends('backend.layout')

@section('content')
<h1> Podkategorie</h1>
<div>
    <form action="{{ action('SubcategoriesController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Nazwa:</td><td> <input type="text" name="subcategoriesName" placeholder="nazwa"  required></td> </tr>
       <tr><td>Opis: </td><td>  <input type="text" name="subcategoriesDescription" placeholder="opis"  required></td> </tr> 
       <tr><td>Nazwa pliku obrazka:</td><td>  <input type="text" name="subcategoriesPicture_file_name"  required></td> </tr>
       <tr><td>Adres: </td>
       <td>
       <select name="categories">
    
                @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                 @endforeach
        </select>
        <tr><td></td><td><input type="submit" value="Dodaj kategorie!" class="btn btn-success"></td></tr>
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection