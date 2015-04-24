@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>

<form action="{{ URL::route('postRegister') }}" method='POST'>
   
    email: <input type='text' name='email' value="{{Input::old('email')}}"></input>
    @if($errors->has('email'))
        {{$errors->first('email')}}
    @endif
    </br>

    <input type='submit' name='request' value='request'></input></br>

</form>

@stop