@extends('backend.layout')

@section('content')
<h1> Wyniki</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Set</th>
                      <th>Użytkownik</th>
                      <th>data</th>
                      <th>Procent</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($results as $r)
                    <tr>
                    <td>
                        {{$r->sets->name}}
                    </td>
                    <td>
                        {{$r->users->name}}
                    </td>
                    <td>
                        {{$r->date}}
                    </td>
                    <td>
                        {{$r->percent}}
                    </td>

                    

                    <td><a href="{{ route('results.show',$r->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('results.edit',$r->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('results.destroy', $r->id)}}" method="post" id="delete">
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
               
                {{$results->links()}}
@endsection