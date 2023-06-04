<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="{{ url('/') }}/public/css/bootstrap.css" rel="stylesheet"/>
	<link href="{{ url('/') }}/public/css/custom-admin.css" rel="stylesheet"/>
	
	<link rel="shortcut icon" href="{{ url('/') }}/public/favicon.ico">
</head>
<body>
	<div class="container">
		<?php

		//echo $_COOKIE['cookie_ngayau_user'];

		?>
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center"><b>AQMS v0.1</b></h5>
						<center>Air Quality Monitoring System</center>
						<center><p>By : Belen Septian</p></center>
						@if (session('status'))
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>{{ session('status') }}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
						<form class="form-signin" method="post" action="{{  url('/') }}/admin/forgot-password" enctype="multipart/form-data">
						{{ csrf_field() }}
							<div class="form-label-group">
								<input type="email" name="username" id="inputEmail" class="form-control" placeholder="Alamat Email" required>
								<label for="inputEmail">Email Address</label>
							</div>
							<center><a href="{{ url('/') }}/admin/login">I already have account!</a></center>
							<center><a href="{{ url('/') }}/admin/register">I want to create a new account!</a></center>
							<hr class="my-4">
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Request Password</button>
						</form>
						@if(isset($notif))
							<br>
							<div class="alert alert-danger">{{ $notif }}</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ url('/') }}/public/js/bootstrap.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/public/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/public/js/custom.js"></script>
</body>
</html>