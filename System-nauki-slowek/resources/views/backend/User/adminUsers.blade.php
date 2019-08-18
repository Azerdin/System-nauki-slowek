@extends('backend.layout')

@section('content')

<h1> Użytkownicy </h1>

    <div class="content">
                <table>
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>Nazwa</th>
                      <th>E-mail</th>
                      <th>Rola</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td> 
                    <td>{{$u->email}}</td> 
                    
                    <td>
                    @foreach($u->roles as $r)
                      @if($r->hidden == 1)
                      {{$r->name}}
                      @endif
                     @endforeach
                    </td>
                    <td><a href="{{ route('users.show',$u->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('users.edit',$u->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('users.destroy', $u->id)}}" method="post" id="delete">
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
               
                {{$users->links()}}
                </div>
@endsection