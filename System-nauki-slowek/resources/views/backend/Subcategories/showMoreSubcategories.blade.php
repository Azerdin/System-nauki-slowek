@extends('backend.layout')

@section('content')
<h1> Podkategorie</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                    <th>Id</th>
                      <th>Nazwa</th>
                      <th>Opis</th>
                      <th>Nazwa pliku obrazka</th>
                      <th>Kategoria</th>
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>{{$subcategories->id}}</td> 
                    <td>{{$subcategories->name}}</td> 
                    <td>{{$subcategories->description}}</td> 
                    <td>{{$subcategories->picture_file_name}}</td> 
                    <td>{{$subcategories->categories->name}}</td>
                    <td>{{$subcategories->created_at}}</td> 
                    <td>{{$subcategories->update_at}}</td> 
                    </tr>
                      <script>
    $(document).ready(function()
    {
        $(".delete").on("submit", function(){
                 return confirm("Are you sure?");
        });
    });
                        
  </script>
                </tbody>

                </table>
@endsection