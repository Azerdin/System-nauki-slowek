@extends('backend.layout')

@section('content')

<h1> Użytkownicy </h1>
<div class="content">
                <table>
                  <thead>
                    <tr>
                    <th>Id</th>
                      <th>Nazwa</th>
                      <th>E-mail</th>
                      <th>Data werifikacji email</th>
                      <th>Remember token</th>
                      <th>Data utworzenia</th>
                      <th>Data modyfikacji</th>
                      <th>Rola</th>
                    </tr>
                  </thead>
                <tbody>
                    <tr>
                    <td>{{$users->id}}</td> 
                    <td>{{$users->name}}</td> 
                    <td>{{$users->email}}</td> 
                    <td>{{$users->email_verified_at}}</td> 
                    <td>{{$users->remember_token}}</td> 
                    <td>{{$users->created_at}}</td> 
                    <td>{{$users->updated_at}}</td> 
                    <td>
                    @foreach($users->roles as $r)
                      {{$r->name}}
                     @endforeach
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
                <div>
@endsection