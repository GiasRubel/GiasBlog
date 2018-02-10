@extends('vlog.header')
@section('title','Api')
@section('body')
	{{-- <img src="https://www.edamam.com/web-img/262/262b4353ca25074178ead2a07cdf7dc1.jpg"> --}}
	{{-- {{ $result['q'] }} --}}
	
{{-- 	<div class="blog-artical-info-head">
	    <h2><a href="">{{$value['label']}}</a></h2>
				<img src="{{$value['image']}}"> --}}

	    
{{-- 	</div>
	<div class="nam-matis">
		<div class="nam-matis-top">
			@foreach ($result['hits'] as $element)
					@foreach ($element as $value)
				<div class="col-md-4 nam-matis-1">
					<a href=""><img src="{{$value['image']}}" class="img-responsive" alt=""></a>
					<h3><a href="">{{$value['label']}}</a></h3>
					{{-- <p>{{substr($items->body,0,200)}}{{strlen($items->body) > 200 ? ".." : ""}}</p> --}}
				{{-- </div> --}}
						{{-- @endforeach --}}
				{{-- @endforeach --}}
					{{-- <div class="clearfix"> </div> --}}
			{{-- </div> --}}
			
	{{-- </div> --}}
				
	

{{-- </div> --}} 

<!--
    youtube:  https://www.youtube.com/channel/UCqlv40k1N0L9nsSrzL1OWwg/videos
    site:     http://www.templateindirr.com
-->
@section('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"> 
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
	<link href="{{ asset('vlog_css/api.css') }}" rel="stylesheet" type="text/css" media="all" />

@endsection


<!--
    youtube:  https://www.youtube.com/channel/UCqlv40k1N0L9nsSrzL1OWwg/videos
    site:     http://www.templateindirr.com
-->



<div class="blog">
    <div class="container">
           
            
               
                		
           <div class="row">
			
			    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-offset-10" data-aos="fade-right"> --}}
			    	
                    {{-- <div class="col-lg-6 col-xs-12">
                       
					</div> --}}
					
					<div class="col-lg-6 col-xs-12 ">
						    	
						 <div class="blog-column">
						 	    	 @foreach ($result['hits'] as $element)
						 		@foreach ($element as $value)
						 	

						 	<img src="{{$value['image']}}" alt="" width="100%">
						 	<span>{{$value['label']}}</span>
						 	<span>{{$value['calories']}}</span>
						 	
						 	    @endforeach
						 	     @endforeach	
							{{-- <span>{{$value['label']}}</span>
							
							 <ul class="blog-detail list-inline"> 
								<li><i class="fa fa-user"></i>John Doe</li> 
								<li><i class="fa fa-clock-o"></i>March 01, 2017</li> 
							</ul> 
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
							<a href="#">Read More</a> --}}

						</div>
						
					</div>
					
                {{-- </div> --}}
				
           </div>
          
           		

    </div>
</div>
@endsection
