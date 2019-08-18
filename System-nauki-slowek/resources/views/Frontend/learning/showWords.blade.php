@extends('FrontEnd.layout')


@section('content')
<div class="container">
@for($i=0; $i<$sets->number_of_words; $i++)
    <div class="row">

   
            <div class="col">
            <div class="words">
            <h5><b>{{$languages1Array[$i]}}</b> {{$languages2Array[$i]}}</h5>
            </div>
         </div>

    </div>
@endfor
</div>
@endsection