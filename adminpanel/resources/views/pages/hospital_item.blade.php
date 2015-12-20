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
<h3>{{ $hospital->hospital_name }}</h3>
<br />
<h4>Address: {{ $hospital->hospital_address }}</h4>
<h4>Contact Number:  {{ $hospital->contact_number }}</h4>
<h4>Number of Beds:  {{ $hospital->bed_count }}</h4>
<h4>Status:  {{ $hospital->status }}</h4>
  
</div>
</div>

@stop