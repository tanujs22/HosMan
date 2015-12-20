@extends('layouts.master')
 @section('content')



 <header class="intro-header" style="background-image:url('{{ asset('img/hosp1.jpg') }}');">

	<div class="container">
	<div class="row">
	<div class="site-heading">

	<h1>{{ $title }}</h1>

	<span class="subheading"></span>
	</div>
	</div>
	</div>
	</div>
	</header>

<!-- End Of Header Banner -->



 <!-- Page Content -->
    <div class="container">

 <!-- Page Heading -->
    <div class="row">
    <div class="col-lg-12">
    </div>
    </div>
 <!-- /.row -->
    </div>


 <!-- Display table of hospital from database -->

      @foreach($doctors as $doctor)
    <div class="row">
    <div class="col-md-5">
    <img src="http://placehold.it/300x200" alt="" class="img-thumbnail center-block" />
 
 
    <br />
    </div>
    <div class="col-md-5">
    <h3>{{ $doctor->doctor_name }}</h3>
   
    <a class="btn btn-primary" href="{{ URL::to('doctors/item/' . $doctor->id) }}">More Info <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    </div>



     @endforeach


  
 <!-- Pagination -->

  {!! $doctors->render() !!}



 @stop


