@extends('layouts.header')
@section ('title','edit catagory')
@section('body')
<div class="row">
<br>
	<div class="col-md-8 col-md-offset-2">
		<h3>Edit catagory</h3><hr><br><br>
		<form  class="form-horizontal" method="post" action="{{route('catagory.update',$items->id)}}">
		{{csrf_field()}}
		{{method_field('PUT')}}
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Title:</label>
			  <div class="col-lg-8">
			    <input type="text" class="form-control" name="name" id="inputEmail" placeholder="Catagory Type" value="{{ $items->name }}"  {{-- required="" --}}>
			    <span class="help-block"></span>
			    {{-- @if ($errors->has('title'))
			      <p class="text-danger">{{$errors->first('title')}}</p>
			    @endif --}}
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-8 col-lg-offset-2">
			    <button type="submit" class="btn btn-primary">EDIT</button>
			  </div>
			</div>
		</form>
	</div>
</div>
@stop