@extends('backend.layout')

@section('content')
<h1> Role</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Opis</th>
                      <th>Hidden</th>
                      <th>Modyfikuj</th>
                      
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($roles as $r)
                    @if($r->hidden == 1)
                    <tr><td>{{$r->name}}</td> 
                    <td>{{$r->description}}</td> 
                    <td>{{$r->hidden}}</td>
                    <td><a href="{{ route('roles.edit',$r->id)}}" class="btn btn-primary">Edytuj</a></td>
                    <td>
                <form class="delete" action="{{ route('roles.destroy', $r->id)}}" method="post" id="delete">
                  @csrf
                  @endif
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
                {{$roles->links()}}
@endsection