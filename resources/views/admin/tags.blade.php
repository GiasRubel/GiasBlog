@extends('layouts.header')
@section('title','Tags')
@section('body')
	<div class="row">
	<br>
	@if (session()->has('massage'))
		<h5 class="alert alert-success">{{session()->get('massage')}}</h5>
		{{-- expr --}}
	@endif
		<div class="col-lg-6">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tags</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($items as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td><a href="{{ route('tag.show',$item->id) }}">{{$item->name}}</a></td>
						<td>
							<a href="{{route('tag.edit',$item->id)}}" class="btn btn-primary btn-xs">Edit</a> || 
							<form class="" method="post" action="{{route('tag.destroy',$item->id)}}" style="margin-top: -23px;margin-left: 48px;">
								{{csrf_field()}}
								{{method_field('Delete')}}
								<button type="submit" class="btn btn-danger btn-xs">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
					
				</tbody>
			</table>
		</div>	
		<div class="col-lg-4 col-lg-offset-1 ">
			<div class="well ">
				<form class="form-horizontal" method="post" action="{{route('tag.store')}}" >
				{{csrf_field()}}
				  <fieldset>
				    <legend>Tags</legend>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Tag</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control"  placeholder="tag" name="name">
				      </div>
				    </div>
				    
				    
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div> 	
		</div>
	</div>

	<div class="text-center">
		{{ $items->links() }}
	</div>
	
@endsection