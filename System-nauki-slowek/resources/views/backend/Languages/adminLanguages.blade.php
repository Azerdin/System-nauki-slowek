@extends('backend.layout')

@section('content')
<h1> Języki</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Nazwa</th>
                      <th>Symbol</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($languages as $l)
                    <tr><td>{{$l->name}}</td> 
                    <td>{{$l->symbol}}</td> 
                    <td><a href="{{ route('languages.show',$l->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('languages.edit',$l->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('languages.destroy', $l->id)}}" method="post" id="delete">
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
               
                {{$languages->links()}}
@endsection