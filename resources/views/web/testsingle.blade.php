@extends('vlog.header')
@section('title','Single Post')
@section('css')
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link href="{{ asset('vlog_css/alga.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection 
@section('body')
<div class="content-top">
	
			<div class="single">
				<div class="single-top">
					<img src="{{ asset('images/'.$post->image) }}" class="img-responsive" alt="">
					
					<p class="sin">{{$post->body}}</p>
					
						<div class="artical-links">
		  						 	<ul>
		  						 		<li><small> </small><span>{{date(" ha: dS F Y", strtotime($post->created_at))}}</span></li>
		  						 		<li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
		  						 		<li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
		  						 		<li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
		  						 	</ul>
		  						 </div>
		  						 <br>
						<div class="container">
						    <div class="col-sm-8">
						        <div class="panel panel-white post panel-shadow">
						            <div class="post-footer">
						                <form method="post" action="{{ url('comment',$post->id) }}">
						                {{csrf_field()}}
						                	<div class="input-group"> 
						                	    <input class="form-control" placeholder="Add a comment" type="text" name="body">
						                	    <span class="input-group-addon">
						                	        <a href="#"><i class="fa fa-edit"></i></a>  
						                	    </span>
						                	</div>
						                	<button type="submit" class="btn pull-right" style="margin-top: 5px;">Add</button>
						                </form>
						         @foreach ($post->comments as $comment)
						                	{{-- expr --}}
						                
						                <ul class="comments-list">
						                    <li class="comment">
						                        <a class="pull-left" href="#">
						                            <img class="avatar" src="{{"https://www.gravatar.com/avatar/". md5( strtolower( trim( $comment->users->email ) ) ). "?d=monsterid" }}" alt="avatar">
						                        </a>
						                        <div class="comment-body">
						                            <div class="comment-heading">
						                                <h4 class="user">{{$comment->users->name}}</h4>
						                                <h5 class="time">{{$comment->created_at->diffForHumans()}}</h5>
						                            </div>
						                            <p>{{$comment->body}}</p>
						                            <span class="glyphicon glyphicon-share-alt" data-toggle="collapse" data-target="#new"><small> <a href="">Reply</a></small></span>
						                        </div>
						                        <ul class="comments-list">

						                            @foreach ($comment->comments as $reply)
						                            	<li class="comment">
						                                <a class="pull-left" href="#">
						                                    <img class="avatar" src="http://bootdey.com/img/Content/user_3.jpg" alt="avatar">
						                                </a>
						                                <div class="comment-body">
						                                    <div class="comment-heading">
						                                        <h4 class="user">{{$reply->users->name}}</h4>
						                                        <h5 class="time">{{$reply->created_at->diffForHumans()}}</h5>
						                                    </div>
						                                    <p>{{$reply->body}}</p>
						                                </div>
						                            </li> 


						                            @endforeach

						                            <form method="post" action="{{ url('reply',$comment->id) }}" {{-- class="collapse" --}} class="hidden" id="new">
						                            {{csrf_field()}}
						                            	<div class="input-group"> 
						                            	    <input class="form-control " placeholder="Add a Reply" type="text" name="body" style="width: 225%">
						                            	</div>
						                            	<button type="submit" class="btn pull-left" style="margin-top: 5px;">Reply</button>
						                            </form>
						                            {{-- <li class="comment">
						                                <a class="pull-left" href="#">
						                                    <img class="avatar" src="http://bootdey.com/img/Content/user_2.jpg" alt="avatar">
						                                </a>
						                                <div class="comment-body">
						                                    <div class="comment-heading">
						                                        <h4 class="user">Gavino Free</h4>
						                                        <h5 class="time">3 minutes ago</h5>
						                                    </div>
						                                    <p>Ok, cool.</p>
						                                </div>
						                            </li> --}} 
						                        </ul>
						                    </li>
						                </ul>
						                
						    @endforeach

						            </div>
						        </div>
						    </div>
						</div>
						

				<div class="blog-content-right">
						    <div class="clearfix"> </div>

						<div class="b-search">
							<form>
								<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
								<input type="submit" value="">
							</form>
						</div>
						<!--start-twitter-weight-->
						<div class="twitter-weights">
							<h3>Tweet Widget</h3>
							<div class="twitter-weight-grid">
								<h4><span> </span>John Doe</h4>
								<p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
								<i><a href="#">2 days ago</a></i>
							</div>
							<div class="twitter-weight-grid">
								<h4><span> </span>John Doe</h4>
								<p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
								<i><a href="#">2 days ago</a></i>
							</div>
							<a class="twittbtn" href="#">See all Tweets</a>
						</div>
						<!--//End-twitter-weight-->
						<!-- start-tag-weight-->
						<div class="b-tag-weight">
							<h3>Tags Weight</h3>
							<ul>
								@foreach ($post->tags as $tag)
									<li><a href="{{ route('blog.tagpost', $tag->id) }}">{{$tag->name}}</a></li>
								@endforeach
								
							</ul>
						</div>
						<!---- //End-tag-weight---->
					</div>
					<div class="clearfix"> </div>
			</div>
</div>
<!-- content -->
@endsection


