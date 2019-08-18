@extends('backend.layout')

@section('content')
<h1> Kategorie</h1>
<div>
    <form action="{{ action('CategoriesController@store') }}" method="post">
        {{ csrf_field() }}
        <table>
        <tr><td>Nazwa:</td><td> <input type="text" name="categoriesName" placeholder="nazwa" ></td> </tr>
       <tr><td>Opis: </td><td>  <input type="text" name="categoriesDescription" placeholder="opis"  ></td> </tr> 
       <tr><td>Nazwa pliku obrazka:</td><td>  <input type="text" name="categoriesPicture_file_name" placeholder="nazwa pliku obrazka" ></td> </tr>
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