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
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>
                        {{$editors->users->name}}
                    </td>
                    <td>
                        {{$editors->subcategories->name}}
                    </td>
                    <td>
                        {{$editors->created_at}}
                    </td>
                    <td>
                        {{$editors->updated_at}}
                    </td>
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