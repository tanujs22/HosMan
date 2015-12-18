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


<div class="jumbotron">
<div class="container">
<h3>{{ $doctor->doctor_name }}</h3>
<br />
<h4>Address: l{{ $doctor->address }}</h4>
<h4>Contact Number:  {{ $doctor->contact_number }}</h4>
<h4>Specialisation:  {{ $doctor->specialisation }}</h4>
<h4>Status:  {{ $doctor->status }}</h4>
  
</div>
</div>

@stop