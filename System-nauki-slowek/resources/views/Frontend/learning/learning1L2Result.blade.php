@extends('Frontend.layout')


@section('content')

<div class="container">
<div class="results">
    <div class="col">
    
        <div class="row">
        <table>
        <tr>
        <td style="color: white">{{$sets->languages2->name}}</td>
        <td style="color: white">{{$sets->languages1->name}}</td>
        <td style="color: white">Twoja odpowiedź</td>
        <td style="color: white">Wynik</td>
        </tr>
        @for($i=0; $i<count($correctArray); $i++)
        @if($correctArray[$i] == 1)
        <tr><td><h4>{{$languages2Array[$i]}}</h4></td><td><h4>{{$languages1Array[$i]}}</h4></td><td><h4 style="color: white">{{$words[$i]}}</h4></td><td><h4 style="color: green">1</h4></td></tr>
        @else
        <tr><td><h4>{{$languages2Array[$i]}}</h4></td><td><h4>{{$languages1Array[$i]}}</h4></td><td><h4 style="color: white">{{$words[$i]}}</h4></td><td><h4 style="color: red">0</h4></td></tr>
        @endif
        
       @endfor
       
        </table>
        
    </div>
    <div class="row">
    <h2>{{$points}}/{{count($correctArray)}}</h2>
    <h2>{{$percent}}%</h2>
    </div>
    </div>
    </div>
</div>
@endsection