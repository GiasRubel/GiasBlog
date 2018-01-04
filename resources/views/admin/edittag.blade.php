@extends('layouts.header')
@section('title','Tag')

@section('body')
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<form class="form-horizontal" method="post" action="{{route('tag.update',$item->id)}}" >
				{{csrf_field()}}
				{{method_field('PUT')}}
				  <fieldset>
				    <legend>Edit Tags</legend>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Edit Tag</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control"  placeholder="tag" name="name" value="{{$item->name}}" ">
				      </div>
				    </div>
				    
				    
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="submit" class="btn btn-primary">Edit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
		</div>
	</div>
@endsection