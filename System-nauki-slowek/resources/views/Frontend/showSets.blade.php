@extends('Frontend.layout')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <center><h1>Publiczne</h1></center>
        </div>
    </div>
    <div class="row">
    @if(count($sets2) != 0)
        @foreach($sets2 as $s)
            <div class="col">
                <div class="sets">
                    <h2><a href="{{route('choiceOptions', $s->id)}}"><h2>{{$s->name}}</h2></a>
                </div>
            </div>
        @endforeach
    @else
        <div class="col">
            <div class="notReady">
                <h2>Jeszcze nie gotowe</h2>
            </div>
         </div>
    
    @endif
    </div>

    <div class="row">
        <div class="col">
            <center> <h1>Prywatne</h1></center>
        </div>
    </div>
    <div class="row">
        @if(count($sets2) != 0)
            @foreach($sets1 as $s)
                <div class="col">
                    <div class="sets">
                        <a href="{{route('choiceOptions', $s->id)}}"><h2>{{$s->name}}</h2></a>
                    </div>
                </div>
            @endforeach
        @else
    <div class="col">
        <div class="notReady">
                <h2>Jeszcze nie gotowe</h2></a>
        </div>
    </div>
    @endif
</div>
</div>
@endsection