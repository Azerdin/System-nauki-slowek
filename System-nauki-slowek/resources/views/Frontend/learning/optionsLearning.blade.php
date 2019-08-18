@extends('Frontend.layout')


@section('content')
<div class="container">
        
    <div class="row">
   
        <div class="col">
        <div class="learning">
           <h1> {{$sets->name}} - tryb nauki</h1>
           <a href="{{route('showWords', $sets->id)}}"><h3> Wyświetl zawartość zestawu</h3></a>
           <h1> Odpytywanie ze słówek {{$sets->languages1->name}} -> {{$sets->languages2->name}}</h1>
            <a href="{{route('learning1L1', $sets->id)}}"><h5>TEST</h5></a>
           <h1> Odpytywanie ze słówek {{$sets->languages2->name}} -> {{$sets->languages1->name}}</h1>
           <a href="{{route('learning1L2', $sets->id)}}"><h5>TEST</h5></a>
    </div>
         </div>
    </div>
</div>
@endsection