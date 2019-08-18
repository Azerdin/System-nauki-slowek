@extends('Frontend.layout')


@section('content')
<div class="container" >
    <div class="row" >
    <form action="{{action('FronController@algorithmChecking', $sets->id)}}" method="post" >
    @csrf
    <div class="col">
    
        @foreach($languages1Array as $l)
        <div class="test">
        <label>{{$l}}</label>
        <input type="text" class="form-control" name="words[]">
        </div>
        @endforeach
    
        <input type="submit" value="Sprawdź" class="btn btn-success" id="check">
    </div>
    </form>

    </div>
</div>

@endsection