<!DOCTYPE html>
<html>
	<head>
		@include('layouts.app')
		@include('layouts.header')
	</head>
	<body class="fixed-left login-page">
		<!-- Begin page -->
		<div class="container">
			<div class="full-content-center">
				<p class="text-center"><a href="#"><img src="{{ asset('assets/img/login-logo.png') }}" alt="Logo"></a></p>
				<div class="login-wrap animated flipInX">
					<div class="login-block">
						<img src="{{ asset('images/users/default-user.png')}}" class="img-circle not-logged-avatar">
						<form role="form" action="{{ url('admin/login') }}" method="POST">
							
							{!! csrf_field() !!}
							@if($errors->has('errorlogin'))
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								{{$errors->first('errorlogin')}}
							</div>
							@endif
							
							<div class="form-group login-input">
								<i class="fa fa-user overlay"></i>
								<input type="email" class="form-control text-input" name="email" value="{{ old('email') }}" placeholder="Email">
								@if($errors->has('email'))
								<p style="color:red">{{$errors->first('email')}}</p>
								@endif
							</div>
							
							<div class="form-group login-input">
								<i class="fa fa-key overlay"></i>
								<input type="password" class="form-control text-input" name="password" placeholder="********">
								@if($errors->has('password'))
								<p style="color:red">{{$errors->first('password')}}</p>
								@endif
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success btn-block">LOGIN</button>
								</div>
								<div class="col-sm-6">
									<a href="{{route('login')}}" class="btn btn-default btn-block">Register</a>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!-- End of page -->
		<div class="md-overlay"></div>
		<!-- End of eoverlay modal -->
		<script>
			var resizefunc = [];
		</script>
		@include('layouts.script')
	</body>
</html>