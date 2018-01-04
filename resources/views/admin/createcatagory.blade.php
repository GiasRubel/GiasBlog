@extends('layouts.header')
@section ('title','create catagory')
@section('body')
<div class="row">
<br>
	<div class="col-md-8 col-md-offset-2">
		<h1>Create catagory</h1>
		<form  class="form-horizontal" method="post" action="{{route('catagory.store')}}" data-parsley-validate="">
		{{csrf_field()}}
		 @if ($errors->has('name'))
          <p class="text-danger">{{$errors->first('name')}}</p>
        @endif
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Catagory:</label>
			  <div class="col-lg-8">
			    <input type="text" class="form-control" name="name" id="inputEmail" placeholder="Catagory Type" value="{{ old('name') }}"  required="" >
			    <span class="help-block"></span>
			    {{-- @if ($errors->has('title'))
			      <p class="text-danger">{{$errors->first('title')}}</p>
			    @endif --}}
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-8 col-lg-offset-2">
			    <button type="submit" class="btn btn-primary">@yield('type','Submit')</button>
			  </div>
			</div>
		</form>
	</div>
</div>
@stop