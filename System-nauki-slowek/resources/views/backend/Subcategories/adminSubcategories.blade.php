@extends('backend.layout')

@section('content')
<h1> Podkategorie</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Opis</th>
                      <th>Nazwa zdjecia pliku</th>
                      <th>Kategorie</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($subcategories as $s)
                    <tr><td>{{$s->name}}</td> 
                    <td>{{$s->description}}</td> 
                    <td>{{$s->picture_file_name}}</td> 
                    <td>{{$s->categories->name}}</td>
                    <td><a href="{{ route('subcategories.show',$s->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('subcategories.edit',$s->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('subcategories.destroy', $s->id)}}" method="post" id="delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" >Usuń</button>
                </form>
            </td>
                    </tr>
                      @endforeach  
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
               
                {{$subcategories->links()}}
@endsection