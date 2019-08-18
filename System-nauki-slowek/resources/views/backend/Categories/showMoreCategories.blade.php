@extends('backend.layout')

@section('content')
<h1> Kategorie</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                    <th>Id</th>
                      <th>Nazwa</th>
                      <th>Opis</th>
                      <th>Nazwa pliku obrazka</th>
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>{{$categories->id}}</td> 
                    <td>{{$categories->name}}</td> 
                    <td>{{$categories->description}}</td> 
                    <td>{{$categories->picture_file_name}}</td> 
                    <td>{{$categories->created_at}}</td> 
                    <td>{{$categories->update_at}}</td> 
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