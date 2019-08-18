@extends('backend.layout')

@section('content')
<h1> Kategorie</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Opis</th>
                      <th>Nazwa zdjecia pliku</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($categories as $c)
                    <tr><td>{{$c->name}}</td> 
                    <td>{{$c->description}}</td> 
                    <td>{{$c->picture_file_name}}</td> 
                    <td><a href="{{ route('categories.show',$c->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('categories.edit',$c->id)}}" class="btn btn-primary">Edytuj</a></td>
                    
                    <td>
                <form class="delete" action="{{ route('categories.destroy', $c->id)}}" method="post" id="delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" >Usuń</button>
                </form>
            </td>
                    </tr>
                    
                      @endforeach  
                      @if(count($errors) > 0)
                         @foreach($errors->all() as $e)
                            <p class="alert alert-danger">{{ $e }} </p>
                          @endforeach
                      @endif
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
               
                {{$categories->links()}}
@endsection