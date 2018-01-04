@extends('vlog.header')
@section('title','Register')
@section('body')
<!-- registration -->
<div class="container">
	<div class="main-1">
		
			<div class="register">


			<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
			    {{ csrf_field() }}

			    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			        <label for="name" class="col-md-4 control-label">Name</label>

			        <div class="col-md-6">
			            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

			            @if ($errors->has('name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

			        <div class="col-md-6">
			            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

			            @if ($errors->has('email'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('email') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			        <label for="password" class="col-md-4 control-label">Password</label>

			        <div class="col-md-6">
			            <input id="password" type="password" class="form-control" name="password" required>

			            @if ($errors->has('password'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('password') }}</strong>
			                </span>
			            @endif
			        </div>
			    </div>

			    <div class="form-group">
			        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

			        <div class="col-md-6">
			            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-md-6 col-md-offset-4">
			            <button type="submit" class="btn btn-primary">
			                Register
			            </button>
			        </div>
			    </div>
			</form>
{{-- 		  	  <form> 
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>First Name<label>*</label></span>
						<input type="text"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Last Name<label>*</label></span>
						<input type="text"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span>
						 <input type="text"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password<label>*</label></span>
								<input type="password">
							 </div>
							 <div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password<label>*</label></span>
								<input type="password">
							 </div>
					 </div>
				</form> --}}
				<div class="clearfix"> </div>
				{{-- <div class="register-but">
				   <form>
					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div> --}}
		   </div>
	</div>
<!-- registration -->

@endsection