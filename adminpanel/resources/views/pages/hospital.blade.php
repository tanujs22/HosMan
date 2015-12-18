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

 <!-- Display table of hospital from database -->

      @foreach($hospitals as $hospital)
    <div class="row">
    <div class="col-md-5">
    <img src="http://placehold.it/700x300" alt="" class="img-responsive" />
    <!--  src="{{asset($hospital->image)}}"  alt="{{$hospital->img_caption}}" -->
 
    <br />
    </div>
    <div class="col-md-5">
    <h3>{{ $hospital->hospital_name }}</h3>
   
    <a class="btn btn-primary" href="{{ URL::to('hospital/item/' . $hospital->id) }}">More Info <span class="glyphicon glyphicon-chevron-right"></span></a>
                            
   
    </div>
    </div>

     @endforeach

 
 <!-- Pagination -->
 {!! $hospitals->render() !!}

    
 @stop
