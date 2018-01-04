@extends('layouts.header')
@section('title','Tags')

@section('body')
	<div class="row"><br>
		<div class="col-lg-8 col-lg-offset-2">
			<strong>{{$tags->name}} Relate To {{$tags->posts()->count()}} Post</strong><hr>
			<table class="table">
				<thead>
					<tr>
						<th>post</th>
						<th>Tag</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($tags->posts as $post)
					<tr>
						<td><strong>{{$post->title}}</strong></td>
						<td>
							@foreach ($post->tags as $tag)
								<span class="label label-primary">{{$tag->name}}</span>
							@endforeach
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

			<button><a href="{{url('admin/tag ')}}">Back</a></button>
		</div>
	</div>
@endsection