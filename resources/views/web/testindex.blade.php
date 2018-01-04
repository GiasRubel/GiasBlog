<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('vlog.theader')
@section('body')
<!-- header -->
<div class="container">
	<div class="col-md-9 bann-right">
		<!-- banner -->
		<div class="banner">		
			<div class="header-slider">
				<div class="slider">
					<div class="callbacks_container">
					  	<ul class="rslides" id="slider">
					  	@foreach ($item as $items)
					  		<li>
								<img src="{{ asset('images/'. $items->image)}}" class="img-responsive" alt="">
								<div class="caption">
									<h3>{{$items->title}}</h3>
									<p>{{substr($items->body, 0,51)}}{{strlen($items->body) > 51 ? ".." : ""}}</p>
								</div>
							</li>
					  	@endforeach

						</ul>
			  		</div>
				 </div>
			</div>
		</div>
		<!-- banner -->	
		<!-- nam-matis -->
		<div class="nam-matis">
			<div class="nam-matis-top">
				@foreach ($item as $items)
					<div class="col-md-6 nam-matis-1">
						<a href="single.html"><img src="{{ asset('images/'. $items->image)}}" class="img-responsive" alt=""></a>
						<h3><a href="single.html">{{$items->title}}</a></h3>
						<p>{{substr($items->body,0,200)}}{{strlen($items->body) > 200 ? ".." : ""}}</p>
					</div>
					
						
				@endforeach
						<div class="clearfix"> </div>
				</div>
				
		</div>
		<!-- nam-matis -->	
	</div>
	<div class="col-md-3 bann-left">
		<div class="b-search">
			<form>
				<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="">
			</form>
		</div>
		<h3>Recent Posts</h3>
		<div class="blo-top">
			<div class="blog-grids">
				<div class="blog-grid-left">
					<a href="single.html"><img src="images/1b.jpg" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">
					<h4><a href="single.html">Little Invaders </a></h4>
					<p>pellentesque dui, non felis. Maecenas male </p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="blog-grids">
				<div class="blog-grid-left">
					<a href="single.html"><img src="images/2b.jpg" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">
					<h4><a href="single.html">Little Invaders </a></h4>
					<p>pellentesque dui, non felis. Maecenas male </p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="blog-grids">
				<div class="blog-grid-left">
					<a href=""><img src="images/3b.jpg" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">
					<h4><a href="single.html">Little Invaders </a></h4>
					<p>pellentesque dui, non felis. Maecenas male </p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<h3>Categories</h3>
		<div class="blo-top">
			<li><a href="#">||   Lorem Ipsum passage</a></li>
			<li><a href="#">||   Finibus Bonorum et</a></li>
			<li><a href="#">||   Treatise on the theory</a></li>
			<li><a href="#">||   Characteristic words</a></li>
			<li><a href="#">||   combined with a handful</a></li>
			<li><a href="#">||   which looks reasonable</a></li>
		</div>
		<h3>Newsletter</h3>
		
		<div class="blo-top">
			<div class="name">
				<form>
					<input type="text" placeholder="email" required="">
				</form>
			</div>	
			<div class="button">
				<form>
					<input type="submit" value="Subscribe">
				</form>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
	<div class="clearfix"> </div>
		<div class="fle-xsel">
			<ul id="flexiselDemo3">
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/6.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/5.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>			
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/1.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>		
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/4.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/6.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/1.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>				
			</ul>
							
							 <script type="text/javascript">
								$(window).load(function() {
									
									$("#flexiselDemo3").flexisel({
										visibleItems: 5,
										animationSpeed: 1000,
										autoPlay: true,
										autoPlaySpeed: 3000,    		
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: { 
											portrait: { 
												changePoint:480,
												visibleItems: 2
											}, 
											landscape: { 
												changePoint:640,
												visibleItems: 3
											},
											tablet: { 
												changePoint:768,
												visibleItems: 3
											}
										}
									});
									
								});
								</script>
								<script type="text/javascript" src="js/jquery.flexisel.js"></script>
					<div class="clearfix"> </div>
		</div>

	</div>

@stop