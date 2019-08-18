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
                      <th>Walidacja</th>
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                
                    @foreach ($sets as $s)
                    <tr>
                    <td>
                        {{$s->languages1->name}} 
                    </td>
                    <td>
                        {{$s->languages2->name}}
                    </td>
                    <td>
                    {{$s->subcategories->categories->name}}/{{$s->subcategories->name}}
                    </td>
                    <td>
                        {{$s->users->name}}
                    </td>
                    <td>
                        {{$s->name}}
                    </td>
                    <td>
                        {{$s->words}}
                    </td>
                    <td>
                        {{$s->number_of_words}}
                    </td>
                    <td>
                        {{$s->private}}
                    </td>
                    <td>
                        {{$s->validated}}
                    </td>
                    

                    <td><a href="{{ route('sets.show',$s->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('sets.edit',$s->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('sets.destroy', $s->id)}}" method="post" id="delete">
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
               
@endsection