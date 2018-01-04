@extends('vlog.header')
@section('title','Single Post')
@section('css')
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link href="{{ asset('vlog_css/alga.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	
@endsection 
@section('body')

<div class="content-top">
	<div class="single">
		<div class="single-top">
		<h2>{{$post->title}}</h2>
			<img src="{{ asset('images/'.$post->image) }}" class="img-responsive" alt="">
			<p class="sin">{{$post->body}}</p>
			
				<div class="artical-links">
				 	<ul>
				 		<li><small> </small><span>{{date(" ha: dS F Y", strtotime($post->created_at))}}</span></li>
				 		<li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
				 		<li><a href="#"><small class="no"> </small><span> {{$post->comments()->count()}}  comments</span></a></li>
				 		<li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
				 	</ul>
				 </div>
				<div class="respon">
					<div class="col-sm-8">
					    <div class="panel panel-white post panel-shadow">
					        <div class="post-footer">
					            <form method="post" action="{{ url('comment',$post->id) }}">
					            {{csrf_field()}}
					            	<div class="input-group"> 
					            	    <input class="form-control" placeholder="Add a comment" type="text" name="body" style="width: 271%;">
					            	    {{-- <span class="input-group-addon" >
					            	        <button type="submit" class="btn btn-xs ">Add</button>  
					            	    </span> --}}
					            	</div>
					            	<button type="submit" class="btn pull-right" style="margin-top: -34px;margin-right: -60px;">Add</button>
					            	
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
											
					                        <span id="new" class="glyphicon glyphicon-share-alt" onclick="reply({{$comment->id}})" style="cursor: pointer; color: #5489BD;"><small> Reply</small></span>
										@if (Auth::user()->id == $comment->user_id)
											{{-- expr --}}
										
											 <span style="margin-left: 20px;"><small>  <a href="#{{$comment->id}}" data-toggle="modal" >Edit</a></small></span>   

										<!-- Trigger the modal with a button -->

					                        <form class="delform" method="post" action="{{ route('comment.delete', $comment->id) }}">
					                        	{{csrf_field()}}
					                        	{{method_field('DELETE')}}

					                        	<button class="btndel" type="submit" onclick="return confirm('Are You Sure')">Delete</button>
					                        </form>
										@endif
					                    </div>
<!-- Modal -->
  <div class="modal fade" id="{{$comment->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="{{ route('comment.edit',$comment->id) }}">
      {{csrf_field()}}
      {{method_field('PUT')}}

      <div class="modal-body">
        	<div class="input-group"> 
    	    	<input class="form-control" placeholder="Edit comment" type="text" name="body" value="{{$comment->body}}" style="width:300%">   
    		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </div>

      </form>

    </div>
  </div>
</div>
<!-- End Modal -->
									<div class="reply-{{$comment->id}} hidden">
										<form method="post" action="{{ url('reply',$comment->id) }}">
									    {{csrf_field()}}
									    	<div class="input-group"> 
									    	    <input class="form-control " placeholder="Add a Reply" type="text" name="body" style="width:225%; margin-left: 14px; margin-top: 20px;">
									    	</div>
									    	<button type="submit" class="btn pull-right" style="margin-top: -48px;margin-right: -60px;">Reply</button>
									    </form>
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
												@if (Auth::user()->id == $reply->user_id)
					                                <span style=""><small>  <a href="#{{$reply->id}}" data-toggle="modal" >Edit</a></small></span>

					                                <form class="delform" method="post" action="{{ route('reply.delete', $reply->id) }}" style="margin-left: 30px;">
					                                	{{csrf_field()}}
					                                	{{method_field('DELETE')}}

					                                	<button class="btndel" type="submit" onclick="return confirm('Are you sure?')"><small>Delete</small></button>
					                                </form>
					                                @endif
					                            </div>
					                        </li> 

											<div class="modal fade" id="{{$reply->id}}" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>

											      <form method="post" action="{{ route('reply.edit',$reply->id) }}">
											      {{csrf_field()}}
											      {{method_field('PUT')}}

											      <div class="modal-body">
											        	<div class="input-group"> 
											    	    	<input class="form-control" placeholder="Edit comment" type="text" name="body" value="{{$reply->body}}" style="width:300%">   
											    		</div>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        <button type="submit" class="btn btn-primary">Update</button>
												      </div>

											      </form>

											    </div>
											  </div>
											</div>
											<!-- End Modal -->												
					                        @endforeach   
					                    </ul>
					                </li>
					            </ul>
					            
					@endforeach

					        </div>
					    </div>
					</div>
				</div>
		</div>
 

		<div class="blog-content-right">
				<!-- Search -->
					<div class="b-search">
						<form method="GET" action="{{ url('search') }}">
							<input type="text" id="q" name="search"  placeholder="Search Here">
							<input type="submit" value="">
						</form>
					</div>
				<!-- End of Search -->

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


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(function()
{
	 $( "#q" ).autocomplete({
	  source: "search/autocomplete"
	});
});
  </script>

	<script>
		function reply(cId) {
			$('.reply-'+cId).toggleClass('hidden');
		}
	</script>

@endsection