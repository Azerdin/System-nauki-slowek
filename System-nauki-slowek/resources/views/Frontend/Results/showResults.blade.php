
@extends('Frontend.layout1')

@section('content')

<?php
$dataPoints[0] = array( "y"=>0, "label" => 0);
 foreach($results as $r)
{
    $dataPoints[] = array( "y"=>$r->percent, "label" => $r->date);
} 

 
 
?>
<div class="content">
                
    </div>
    <div class="container">
    <div class="row">
    <div class="col">
    <center><h1> Wyniki</h1></center>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <div class="results">
                <center><table id="results">
                  <thead>
                    <tr>
                      <th>Set</th>
                      <th>data</th>
                      <th>Procent</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($results as $r)
                    <tr>
                    <td>
                        {{$r->sets->name}}
                    </td>
                    <td>
                        {{$r->date}}
                    </td>
                    <td>
                        {{$r->percent}}
                    </td>


                </form>
            </td>
                    </tr>
                      @endforeach  
                      <script>
    $(document).ready(function()
    {
        $(".delete").on("submit", function(){
                 return confirm("Are you sure?");
        });
    });
                        
  </script>
                </tbody>

                </table></center>
            </div>
            </div>
            </div>
            </div>
               
@endsection