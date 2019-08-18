@extends('backend.layout')

@section('content')
<h1> Podkategorie</h1>

<div>
    <form action="{{ action('SubcategoriesController@update', $subcategories->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="subcategoriesName" placeholder="Nazwa" value="{{ $subcategories->name }}" ></td> </tr>
       <tr><td>Opis: </td><td>  <input type="text" name="subcategoriesDescription" placeholder="E-mail" value="{{ $subcategories->description }}" ></td> </tr> 
       <tr><td>Nazwa pliku obrazka:</td><td>  <input type="text" name="subcategoriesPicture_file_name"  value="{{ $subcategories->picture_file_name }}" ></td> </tr>
       <tr><td>Kategoria: </td>
       <td>
       <select name="categories">
                
                @foreach($categories as $c)
                    @if($c->id == $subcategories->categories->id)
                        <option selected value="{{$c->id}}">{{$c->name}}</option>
                    @else
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endif
                    
                 @endforeach
        </select>
            </td>
       <tr><td></td><td>  <input type="submit" value="Edytuj podkategorie!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection