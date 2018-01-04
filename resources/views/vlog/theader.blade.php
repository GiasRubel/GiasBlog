<!DOCTYPE HTML>
<html>
<head>
<title>Voguish a Blogging Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
<link href="vlog_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="vlog_css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
{{-- <script src="vlog_js/jquery.min.js"></script> --}}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="vlog_js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
	
  </script>
	
</head>
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="vlog_images/logo.png" class="img-responsive" alt=""></a>
			</div>
			
				<div class="head-nav">
					<span class="menu"> </span>
						<ul class="cl-effect-1">
					@if (Route::has('login'))
					@if (Auth::check())
						<li class="active"><a href="home">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="404.html">Shortcodes</a></li>
						{{-- <li><a href="{{url('login')}}">Login</a></li> --}}
						<li><a href="contact.html">Contact</a></li>
						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						        {{ Auth::user()->name }} <span class="caret"></span>
						    </a>

						    <ul class="dropdown-menu" role="menu">
						        <li>
						            <a href="{{ route('user.logout') }}"
						                onclick="event.preventDefault();
						                         document.getElementById('logout-form').submit();">
						                <span style="color:blue;">Logout</span>
						            </a>

						            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
						                {{ csrf_field() }}
						            </form>
						        </li>
						    </ul>
						</li>
					@else
						<li class="active"><a href="/">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="404.html">Shortcodes</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="{{url('login')}}">Login</a></li>
						<li><a href="{{url('register')}}">Register</a></li>
					@endif
				@endif
										<div class="clearfix"></div>
						</ul>
				</div>
						<!-- script-for-nav -->
							<script>
								$( "span.menu" ).click(function() {
								  $( ".head-nav ul" ).slideToggle(300, function() {
									// Animation complete.
								  });
								});
							</script>
						<!-- script-for-nav -->
				
						
			
					<div class="clearfix"> </div>
		</div>
	</div>
	@section('body')
	@show


			<div class="footer">
			<div class="col-md-3 foot-1">
				<h4>Quick Links</h4>
				<ul>
					<li><a href="#">||   Lorem Ipsum passage</a></li>
					<li><a href="#">||   Finibus Bonorum et</a></li>
					<li><a href="#">||   Treatise on the theory</a></li>
				</ul>
			</div>
			<div class="col-md-3 foot-1">
				<h4>Favorite Resources</h4>
				<ul>
					<li><a href="#">||   Characteristic words</a></li>
					<li><a href="#">||   combined with a handful</a></li>
					<li><a href="#">||   which looks reasonable</a></li>
				</ul>
			</div>
			<div class="col-md-3 foot-1">
				<h4>About Us</h4>
				<ul>
					<li><a href="#">||  Even slightly believable</a></li>
					<li><a href="#">||  Hidden in the middle</a></li>
					<li><a href="#">||  Ipsum therefore always</a></li>
				</ul>
			</div>
			<div class="col-md-3 foot-1">
				<h4>Custom Menu</h4>
				<ul>
					<li><a href="#">||  Internet tend to repeat</a></li>
					<li><a href="#">||  Alteration in some form</a></li>
					<li><a href="#">||  This book is a treatise</a></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
			<div class="copyright">
				<p>Copyrights © 2015 Voguish All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	
</body>
</html>