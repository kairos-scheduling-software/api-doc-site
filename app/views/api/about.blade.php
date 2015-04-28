@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>

<div id="about-page-content" class="container">
  <div class="col-md-8">
    <h1>About Kairos</h1>
    <br><br>
    <div class="row">
      <div class="col-md-4">
        <img src="{{URL::asset('assets/images/tyler_profile.jpg')}}" class="img-circle" id="tyler_profile" width=200px/>
      </div>
      <div class="col-md-8">
        <h2>Tyler Chapman</h2>
        <p>Tyler is an experienced web developer having worked for Spillman Technologies as an intern. He has had a passion for working on software for many years after learning java in high school. Tyler has been a great asset to the team working on the database, network communication and the import manager for the project.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <img src="{{URL::asset('assets/images/nate_profile.png')}}" class="img-circle" id="nate_profile" width=200px/>
      </div>
      <div class="col-md-8">
        <h2>Nate Crandall</h2>
        <p>Nate is a visualization wizard.  He crafted and perfected all of the visualizations for this project.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <img src="{{URL::asset('assets/images/vinh_profile.png')}}" class="img-circle" id="vinh_profile" width=200px/>
      </div>
      <div class="col-md-8">
        <h2>Vinh Dang</h2>
        <p>Vinh is a highly talented all-around programmer.  Equally at home solving hard combinatorial problems as writing a GUI, Vinh lent his expertise to many areas of this project.  Upon graduation this year he plans to attend graduate school and continue studying computer science.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <img src="{{URL::asset('assets/images/vince_profile.png')}}" class="img-circle" id="vince_profile" width=200px/>
      </div>
      <div class="col-md-8">
        <h2>Vince Oveson</h2>
        <p>Vince Oveson has worked as a web developer at Aspen Digital for over a year, as of April 2015.  His specialties include php back end development and front end development using jQuery, CSS3, and HTML5.  Vince has been the primary UI designer/developer for Kairos.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <img src="{{ URL::asset('assets/images/tony_profile.png') }}" class="img-circle" id="tony_profile" width=200px/>
      </div>
      <div class="col-md-8">
        <h2>Tony Tuttle</h2>
        <p>Tony has worked as a teaching assistant and research assistant since 2011, while also working towards his computer science degree.  He plans to pursue a masters degree upon graduating. For the Kairos project Tony was involved in the design and implementation of the constraint solver and also did some of the web development.</p>
      </div>
    </div>
  </div>
</div>

@stop