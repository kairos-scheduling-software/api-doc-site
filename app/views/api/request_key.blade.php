@extends('layouts.main')
@section('content')
	<div class="top-buffer"></div>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h1>
			Request API Key
		</h1>

		<form action="{{ URL::route('postRegister') }}" method='POST'>
    		email: <input class="form-control" style="width:250px!important;" type='text' name='email' value="{{Input::old('email')}}"></input>
    		@if($errors->has('email'))
        		{{$errors->first('email')}}
    		@endif
    		</br>
    		<input class="btn btn-primary" type='submit' name='request' value='request'></input></br>
		</form>

		@if(Session::has('global'))
		<div class="global">
			{{Session::get('global')}}
		</div></br>
		@endif
	</div>
	<div class="col-md-3"></div>
@stop