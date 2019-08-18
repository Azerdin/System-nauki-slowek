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
                      <th>Ukryty</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($languages as $l)
                    <tr><td>{{$s->name}}</td> 
                    <td>{{$s->symbol}}</td> 
                    <td>{{$s->hidden}}</td> 
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
               
                {{$languages->links()}}
@endsection