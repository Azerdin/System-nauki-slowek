@extends('backend.layout')

@section('content')
<h1> Zestaw</h1>
<div class="content">
                
    </div>
                <table>
                  <thead>
                    <tr>
                      <th>Język 1</th>
                      <th>Język 2</th>
                      <th>Podkategoria</th>
                      <th>Użytkownik</th>
                      <th>Nazwa</th>
                      <th>Słowa</th>
                      <th>Ilość słów</th>
                      <th>Prywatność</th>
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                      <th>Walidacja</th>

                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>
                    {{$sets->languages2->name}}
                    </td>
                    <td>
                        {{$sets->languages2->name}}
                    </td>
                    <td>
                        {{$sets->subcategories->name}}
                    </td>
                    <td>
                        {{$sets->users->name}}
                    </td>
                    <td>
                        {{$sets->name}}
                    </td>
                    <td>
                        {{$sets->words}}
                    </td>
                    <td>
                        {{$sets->number_of_words}}
                    </td>
                    <td>
                        {{$sets->private}}
                    </td>
                    <td>
                        {{$sets->created_at}}
                    </td>
                    <td>
                        {{$sets->update_at}}
                    </td>
                    <td>
                        {{$sets->validated}}
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