@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>

<div class="container">
  <div class="col-md-8">
  <h1>About Kairos</h1>
  <br>
  <h2>Tyler Chapman</h2>
  <p>This is a paragraph about Tyler.</p>
  <br>
  <h2>Nate Crandall</h2>
  <p>This is a paragraph about Nate.</p>
  <br>
  <h2>Vinh Dang</h2>
  <p>This is a paragraph about Vinh.</p>
  <br>
  <img src="{{URL::asset('assets/images/vince_profile.png')}}" id="vince_profile" width=200px/>
  <h2>Vince Oveson</h2>
  <p>Vince Oveson has worked as a web developer at Aspen Digital for over a year, as of April 2015.  His specialties include php back end development and front end development using jQuery, CSS3, and HTML5.  Vince has been the primary UI designer/developer for Kairos.</p>
  <br>
  <img src="{{ URL::asset('assets/images/tony_profile.png') }}" id="tony_profile" width=200px/>
  <h2>Tony Tuttle</h2>
  <p>Tony has worked as a teaching assistant and research assistant since 2011, while also working towards his computer science degree.  He plans to pursue a masters degree upon graduating. For the Kairos project Tony was involved in the design and implementation of the constraint solver and also did some of the web development.</p>
</div>
</div>