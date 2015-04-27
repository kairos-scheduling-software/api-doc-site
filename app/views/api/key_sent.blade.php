@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>

<div class="container">
  <div class="col-md-8">
  <h1>Your key has been requested.</h1>
  <h2>As soon as it is ready it will be sent to you at {{$email}}.</h2>
  </div>
</div>
@stop