@extends('Frontend.layout')


@section('content')
<div class="container">

    
    <div class="row">
        @foreach($categories as $c)
            <div class="col">
            <div class="categories">
            <h2>{{$c->name}} </h2>
                <a href="{{route('choiceSubcategories', $c->id)}}"><img src="{{ asset($c->picture_file_name) }}" alt="cos"></a>   
                </div>   
            </div>
        @endforeach
    </div>
</div>
@endsection