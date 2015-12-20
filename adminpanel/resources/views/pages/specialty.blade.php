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

<!-- Table Specialty -->   



<div id="tbody">
 

    <table id="report">
    <tr>
    <th colspan="2"><h3>Specialties Available</h3></th>
    </tr>

    <tr>

    @foreach($options as $option)
    <td>{{ $option->specialisation }}</td>
    <td>
    <div class="arrow"></div></td>
    </tr>
  
    <tr>
    <td colspan="5">
    <ul>
 
    <li><a href="#">{{ $option->doctor_name }}</a></li>
    </ul>   
    </td>
    </tr>
   @endforeach


    </table>

  </div>
 </div>




<!-- Pagination -->


    @stop

