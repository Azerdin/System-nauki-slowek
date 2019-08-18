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
                      <th>Szczegóły</th>
                      <th>Modyfikuj</th>
                      <th>Usun</th>
                    </tr>
                  </thead>
                <tbody>
                
                @for($i=0; $i<count($sets); $i++)
                    @for($j=0; $j<count($editors); $j++)
                    @if($editors[$j]->subcategories_id == $sets[$i]->subcategories->id)
                    <tr>
                    <td>
                        {{$sets[$i]->languages1->name}} 
                    </td>
                    <td>
                        {{$sets[$i]->languages2->name}}
                    </td>
                    <td>
                    {{$sets[$i]->subcategories->categories->name}}/{{$sets[$i]->subcategories->name}}
                    </td>
                    <td>
                        {{$sets[$i]->users->name}}
                    </td>
                    <td>
                        {{$sets[$i]->name}}
                    </td>
                    <td>
                        {{$sets[$i]->words}}
                    </td>
                    <td>
                        {{$sets[$i]->number_of_words}}
                    </td>
                    <td>
                        {{$sets[$i]->private}}
                    </td>
                    

                    <td><a href="{{ route('sets.show',$sets[$i]->id)}}" class="btn btn-dark">Szczegóły</a></td>
                    <td><a href="{{ route('sets.edit',$sets[$i]->id)}}" class="btn btn-primary">Edytuj</a></td>

                    <td>
                <form class="delete" action="{{ route('sets.destroy', $sets[$i]->id)}}" method="post" id="delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" >Usuń</button>
                </form>
            </td>
                    </tr>
                    @endif
                      @endfor
                      @endfor
                     
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