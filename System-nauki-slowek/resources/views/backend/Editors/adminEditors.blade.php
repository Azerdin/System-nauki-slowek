@extends('backend.layout')

@section('content')
<h1> Redaktorzy</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Użytkownik</th>
                      <th>Podkategoria</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($editors as $e)
                    <tr>
                    <td>
                        {{$e->users->name}}
                    </td>
                    <td>
                       {{$e->subcategories->categories->name}} {{$e->subcategories->name}}
                    </td>

                    

                    <td><a href="{{ route('editors.show',$e->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('editors.edit',$e->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('editors.destroy', $e->id)}}" method="post" id="delete">
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
               
                {{$editors->links()}}
@endsection