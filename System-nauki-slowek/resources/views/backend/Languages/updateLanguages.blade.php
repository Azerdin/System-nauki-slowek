@extends('backend.layout')

@section('content')
<h1> Języki</h1>
<div>
    <form action="{{ action('LanguagesController@update', $languages->id) }}" method="post">
    @method('PATCH')
        {{ csrf_field() }}
        <table>
       <tr><td>Nazwa:</td><td> <input type="text" name="languagesName" placeholder="Nazwa" value="{{ $languages->name }}" ></td> </tr>
       <tr><td>Symbol: </td><td>  <input type="text" name="languagesSymbol" placeholder="Symbol" value="{{ $languages->symbol }}" ></td> </tr> 
       <tr><td></td><td>  <input type="submit" value="Edytuj język!" class="btn btn-success"></td> </tr>
            
        </table>
    </form>
    @if(count($errors) > 0)
        @foreach($errors->all() as $e)
            <p class="alert alert-danger">{{ $e }} </p>
        @endforeach
    @endif
</div>

@endsection