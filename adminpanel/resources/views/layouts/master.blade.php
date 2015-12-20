
	<DOCTYPE html>
	<html lang="en"> 
	<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>HosMan Project</title>

<!-- Bootstrap Core CSS -->
	{!! HTML::style( asset('css/bootstrap.min.css')) !!}

<!-- Custom Fonts -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font-awesome-animation.min.css">
    

<!-- Custom styles  -->
	{!! HTML::style( asset('css/style.css')) !!}

<!-- Carousel Style -->
    {!! HTML::style( asset('css/carousel.css')) !!}






<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

	</head>

	<body>


      <nav class="navbar navbar-default navbar-custom navbar-static-top">
  <div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header page-scroll">
  <button type="button" class="navbar-toggle" data-toggle="dropdown" data-target="#bs-example-navbar-collapse-1">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="{{ URL::to('home') }}">HosMan</a>
  </div>

<!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">

  <li>
    <a class="faa-pulse animated-hover faa-slow" href="{{ URL::to('home') }}">Home</a>
  </li>

  <li>
    <a class="faa-pulse animated-hover faa-slow" href="{{ URL::to('hospitals') }}">Hospital</a>
  </li>

  <li>
    <a class="faa-pulse animated-hover faa-slow" href="{{ URL::to('doctors') }}">Doctors</a>
    </li>

    <li class="dropdown">
    <a href="{{ URL::to('specialty') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Specialties <span class="caret"></span></a>
    <ul class="dropdown-menu scrollable-menu" role="menu">
    
    @foreach($options as $option)
     
    <li><a href="#">{{ $option->specialisation }}</a></li>
 
    @endforeach
    
    </ul>
    </li>
    
    <li>
    <a class="faa-pulse animated-hover faa-slow" href="{{ URL::to('about') }}">About</a>
  </ul>
  </div>
<!-- /.navbar-collapse -->
  </div>
<!-- /.container -->
  </nav><!-- end nav bar -->





	<div class="container">

	@yield('content')

	</div>


<!--Footer Start -->

    <footer>
    <div class="container">
    <div class="row">

    <div class="col-lg-4">
    <div class="widget">
    <h4 class="widgetheading">Get in touch with us</h4>
    <address>
    <strong>Cumbre Tecnology</strong><br>
    <i class="fa fa-map-marker"></i>
         123 Street St. V124, ABC 01<br>
         Someplace 16425 Earth </address>
    
    <i class="fa fa-phone"></i> (123) 456-7890 - (123) 456-7891 <br>
    <i class="fa fa-envelope"></i> email@domainname.com
    </div>
    </div>


    <div class="col-lg-4">
    <div class="widget">
    <h4 class="widgetheading">Navegation</h4>
    <ul class="link-list">

    <li><a href="#">Terms and conditions</a></li>
    <li><a href="#">Privacy policy</a></li>
    <li><a href="#">FAQs</a></li>
    <li><a href="#">Visitors Guide</a></li>
    <li><a href="#">Contact us</a></li>
    </ul>
    </div>
    </div>


    <div class="col-lg-4">
    <div class="widget">
    <h4 class="widgetheading">Latest posts</h4>
    <ul class="link-list">
    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
    <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
    <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
    </ul>
    </div>
    </div>


    <!--<div class="col-lg-3">
    <div class="widget">
    <h5 class="widgetheading">Flickr photostream</h5>
    <div class="flickr_badge"></div>
    <div class="clear"></div>

    </div>
    </div>-->

     <div id="sub-footer">
     <div class="container">

     <div class="row"><center>
     <div class="col-lg-12">
  
    <ul class="social-network social-circle">
    <li><a href="#" class="icoEmail" title="Email"><i class="fa fa-envelope"></i></a></li>
    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
    </ul> 
    </center> 
    </div>
    </div>


   
    <div class="row">
    <div class="col-lg-12">
  
    <center>
    <span><p class="copyright text-muted">&copy; Cumbre Technology | <?php echo date("Y"); ?> All right reserved.</p>   
    </span>
    </center>
    </div>
    </div>

    </div>
    </div>

    </div>
    </div>
    </footer>
     
  


 <!-- End of footer -->
 


	

<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
	{!! HTML::script( asset('js/jquery.js')) !!}

<!--Custom script -->   
    {!! HTML::script( asset('js/table_toggle.js'))!!}


<!-- Bootstrap Core JavaScript -->
	{!! HTML::script( asset('js/bootstrap.min.js')) !!}	
	{!! HTML::script( asset('jquery/jquery.min.js')) !!}

     
    
 



	</body>
	</html>