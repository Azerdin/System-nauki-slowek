@extends('backend.layout')

@section('content')
<h1> Kategorie</h1>

<div>
    <form action="{{ action('CategoriesController@update', $categories->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="categoriesName" placeholder="nazwa" value="{{ $categories->name }}" ></td> </tr>
       <tr><td>Opis: </td><td>  <input type="text" name="categoriesDescription" placeholder="opis" value="{{ $categories->description }}" ></td> </tr> 
       <tr><td>Nazwa pliku obrazka:</td><td>  <input type="text" name="categoriesPicture_file_name" placeholder="nazwa pliku obrazka" value="{{ $categories->picture_file_name }}" ></td> </tr>
       <tr><td></td><td>  <input type="submit" value="Edytuj kategorie!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection