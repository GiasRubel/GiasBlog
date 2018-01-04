@extends('vlog.header')
@section('title','Blog')
@section('body')
		<div class="blog">
			
		<div class="blog-content">
					<div class="blog-content-left">
						<div class="blog-articals">

					@foreach ($posts as $post)
						{{-- expr --}}
					
						<div class="blog-artical">
							<div class="blog-artical-info">
								<div class="blog-artical-info-img">
									<a href="{{ route('blog.single',$post->id) }}"><img src="{{ asset('images/'.$post->image) }}" title="post-name" height="400"></a>
								</div>
								<div class="blog-artical-info-head">
									<h2><a href="{{ route('blog.single',$post->id) }}">{{$post->title}}</a></h2>
									<h6>Posted on, {{date(" ha: dS F Y", strtotime($post->created_at))}} by <a href="#"> admin</a></h6>
									
								</div>
								<div class="blog-artical-info-text">
									<p>	
									</p>{{substr($post->body, 0,500)}}
									@if (strlen($post->body) > 500)
										<a href="#">[...]</a>
									@endif
									</p>
								</div>
								<div class="artical-links">
		  						 	<ul>
		  						 		<li><small> </small><span>{{date(" dS F Y", strtotime($post->created_at))}}</span></li>
		  						 		<li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
		  						 		<li><a href="#"><small class="no"> </small><span>{{$post->comments()->count()}}  comments</span></a></li>
		  						 		<li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
		  						 		<li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
		  						 	</ul>
		  						 </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					@endforeach
					</div>
					
									{{$posts->links()}}

				<!--//End-blog-pagenate-->
					</div>
					<div class="blog-content-right">
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


								@foreach ($tags as $tag)
									<li><a href="#">{{$tag->name}}</a></li>
								@endforeach
								
							</ul>
						</div>
						<!---- //End-tag-weight---->
					</div>
					<div class="clearfix"> </div>
				
				</div>
		</div>
		<!-- /Blog -->


@endsection

@section('script')
	<script src="https://unpkg.com/vue"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script>
		var app = new Vue({
			el: '#app',
			data: {
				query: '',
    			results: []
			} ,
			methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 1){
     axios.get('/api/searchs',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
	}
  }
}
		})
	</script>
@endsection
