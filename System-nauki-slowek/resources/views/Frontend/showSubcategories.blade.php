@extends('Frontend.layout')


@section('content')
<div class="container">
        
    <div class="row">
    @if(count($subcategories) != 0)
    @foreach($subcategories as $s)
   
            <div class="col">
            <div class="subcategories">
                <h2>{{$s->name}}</h2>
                <p>{{$s->description}}</p>
                <a href="{{route('choiceSets', $s->id)}}"><img src="{{ asset($s->picture_file_name) }}" alt="cos"></a>
                </div>
         </div>
    @endforeach
    @else
    <div class="col">
            <div class="subcategories">
               <h2>Jeszcze nie gotowe</h2>
                </div>
         </div>
    @endif
    </div>
</div>
@endsection