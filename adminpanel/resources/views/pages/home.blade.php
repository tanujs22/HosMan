@extends('layouts.master')
 @section('content')



 


<!--  Start Carousel  -->
<section class="block">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

 <!-- Indicators -->
  <ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">

  <div class="item active">
  <img class="" src="img/care1.png" alt="Hospital Picture">
  <div class="container">
  <div class="carousel-caption">
  <h1>Quisque nulla</h1>
  <p>If you need a doctor for to consectetuer Lorem ipsum dolor, consectetur adipiscing elit. Ut volutpat eros adipiscing elit Ut volutpat.</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a></p>
  </div>
  </div>
  </div>

  <div class="item">
  <img class="second-slide" src="img/care5.jpg" alt="Nurse Picture">
  <div class="container">
  <div class="carousel-caption">
  <h1>Epsum factorial</h1>
  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a></p>
  </div>
  </div>
  </div>

  <div class="item">
  <img class="third-slide" src="img/care2.png" alt="Hospital picture">
  <div class="container">
  <div class="carousel-caption">
  <h1>Deposit quid pro</h1>
  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a></p>
  </div>
  </div>
  </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
  </a>
  </div>
  </section>
 

 <!-- End of carousel -->

 <!--Start boxes search -->

  <section class="callaction">
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <div class="big-cta">
  <div class="cta-text">

  <h2><span> Voluptatem </span> accusantium doloremque</h2>

  </div>
  </div>
  </div>
  </div>
  </div>
  </section>

  <section id="content">
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <div class="row">
  <div class="col-lg-4">
  <div class="box">
  <div class="box-gray aligncenter">
  <h4>Search Hospital</h4>
  <div class="icon">
  <i class="fa fa-ambulance fa-3x"></i>
  </div>
  <p>
  Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
  </p>
  </div>
  <div class="box-bottom">
    <a href="{{ URL::to('hospitals') }}">Learn more</a>
  </div>
  </div>
  </div>


  <div class="col-lg-4">
  <div class="box">
  <div class="box-gray aligncenter">
  <h4>Search Doctor</h4>
  <div class="icon">
  <i class="fa fa-stethoscope fa-3x"></i>
  </div>
  <p>
  Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
  </p>
  </div>
  <div class="box-bottom">
    <a href="{{ URL::to('doctors') }}">Learn more</a>
  </div>
  </div>
  </div>



  <div class="col-lg-4">
  <div class="box">
  <div class="box-gray aligncenter">
  <h4>Search Specialty</h4>
  <div class="icon">
  <i class="fa fa-medkit fa-3x"></i>
  </div>
  <p>
  Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
  </p>
  </div>
  <div class="box-bottom">
    <a href="{{ URL::to('specialty') }}">Learn more</a>
  </div>
  </div>
  </div>


  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  <br><br><br>

  @stop