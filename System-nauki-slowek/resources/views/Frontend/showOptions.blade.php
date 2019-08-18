@extends('Frontend.layout')


@section('content')
<div class="container">
        
    <div class="row">
   
        <div class="col">
        <div class="options">
           <h1> {{$sets->name}}</h1>
           <ul>
                <li><a href="{{route('optionsLearning', $sets->id)}}"><h3 id="learning">Tryb nauki</h3></a></li>
                <li> <a href="{{route('optionsChecking', $sets->id)}}"><h3 id="checking">Tryb sprawdzania wiedzy</h3></a></li>
           </ul>
         </div>
         </div>
    </div>
</div>
@endsection