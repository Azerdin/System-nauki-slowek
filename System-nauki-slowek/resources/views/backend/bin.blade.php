@extends('backend.layout')

@section('content')
<h1>Kategorie</h1>
<table>
<thead>
    <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Nazwa zdjecia pliku</th>
         <th>Przywróć</th>
         <th>Usuń</th>
    </tr>
</thead>

<tbody>
@foreach($categories as $c)
<tr>
    <td>{{$c->name}}</td> 
    <td>{{$c->description}}</td> 
    <td>{{$c->picture_file_name}}</td> 
    <td><a href="{{ route('retriveCategories',$c->id)}}" class="btn btn-success">Przywróc</a></td>
    <td><a href="{{ route('forceDeleteCategories',$c->id)}}" class="btn btn-danger">Usuń</a></td>
</tr>
                    
@endforeach
</tbody>
</table>
<h1>Podkategorie</h1>
<table>
<thead>
    <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Nazwa zdjecia pliku</th>
        <th>Przywróc</th>
        <th>Usuń</th>
    </tr>
</thead>

<tbody>
@foreach($subcategories as $s)
<tr>
    <td>{{$s->name}}</td> 
    <td>{{$s->description}}</td> 
    <td>{{$s->picture_file_name}}</td>
    <td><a href="{{ route('retriveSubcategories',$s->id)}}" class="btn btn-success">Przywróc</a></td>
    <td><a href="{{ route('forceDeleteSubcategories',$s->id)}}" class="btn btn-danger">Usuń</a></td>
 </tr>
                    
@endforeach
</tbody>
</table>
<h1>Redaktorzy</h1>
<table>
<thead>
    <tr>
        
        <th>Nazwa</th>
        
        <th>Przywróć</th>
        <th>Usuń</th>
    </tr>
</thead>
<tbody>
@foreach($editors as $e)
<tr>

                    
                    <td>
                        {{$e->users->name}}
                    </td>
                    
                    <td><a href="{{ route('retriveEditors',$e->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteEditors',$e->id)}}" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    
@endforeach
</tbody>
</table>
<h1>Języki</h1>
<table>
<thead>
     <tr>
        <th>Nazwa</th>
        <th>Symbol</th>
        <th>Przywróć</th>
        <th>Usuń</th>
    </tr>
</thead>
<tbody>
@foreach($languages as $l)
<tr><td>{{$l->name}}</td> 
                    <td>{{$l->symbol}}</td> 
                    <td><a href="{{ route('retriveLanguages',$l->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteLanguages',$l->id)}}" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    
@endforeach
</tbody>
</table>
<h1>Wyniki</h1>
<table>
<thead>
    <tr>
        
        <th>data</th>
        <th>Procent</th>
        <th>Przywróc</th>
        <th>Usuń</th>
    </tr>
</thead>
<tbody>
@foreach($results as $r)
<tr>
                    
                    <td>
                        {{$r->date}}
                    </td>
                    <td>
                        {{$r->percent}}
                    </td>
                    <td><a href="{{ route('retriveResults',$l->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteResults',$l->id)}}" class="btn btn-danger">Usuń</a></td>
</tr>
                    
@endforeach
</tbody>
</table>
<h1>Role</h1>
<table>
<thead>
    <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Hidden</th>
        <th>Przywróć</th>
        <th>Usuń</th>
    </tr>
</thead>
<tbody>
@foreach($roles as $r)
<tr><td>{{$r->name}}</td> 
                    <td>{{$r->description}}</td> 
                    <td>{{$r->hidden}}</td>
                    <td><a href="{{ route('retriveRoles',$r->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteRoles',$r->id)}}" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    
@endforeach
</tbody>
</table>
<h1>Zestawy</h1>
<table>
<thead>
    <tr>
        
        <th>Nazwa</th>
        <th>Słowa</th>
        <th>Ilość słów</th>
        <th>Prywatność</th>
        <th>Przywróć</th>
        <th>Usuń</th>
     </tr>
</thead>
<tbody>   
@foreach($sets as $s)
<tr>
                    
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
                    <td><a href="{{ route('retriveSets',$s->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteSets',$s->id)}}" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    
@endforeach
</tbody>
</table>
<h1>Użytkownicy</h1>
<table>
<thead>
     <tr>
        <th>Nazwa</th>
        <th>E-mail</th>
        <th>Hasło</th>
        <th>Rola</th>
        <th>Przywróć</th>
        <th>Usuń</th>
    </tr>
</thead>
<tbody>
@foreach($users as $u)
                    <tr><td>{{$u->name}}</td> 
                    <td>{{$u->email}}</td> 
                    <td>{{$u->password}}</td> 
                    <td>
                    @foreach($u->roles as $r)
                      @if($r->hidden == 1)
                      {{$r->name}}
                      @endif
                     @endforeach
                    </td>
                    <td><a href="{{ route('retriveUsers',$u->id)}}" class="btn btn-success">Przywróc</a></td>
                    <td><a href="{{ route('forceDeleteUsers',$u->id)}}" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    
@endforeach
</tbody>
</table>
@endsection