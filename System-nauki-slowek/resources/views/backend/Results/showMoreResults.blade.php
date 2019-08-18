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
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>
                        {{$results->sets->name}}
                    </td>
                    <td>
                        {{$results->users->name}}
                    </td>
                    <td>
                        {{$results->date}}
                    </td>
                    <td>
                        {{$results->percent}}
                    </td>
                    <td>
                        {{$results->created_at}}
                    </td>
                    <td>
                        {{$results->updated_at}}
                    </td>

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