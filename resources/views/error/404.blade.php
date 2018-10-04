<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="images/jpg" sizes="16x16" href="{{asset('public/images/layouts/logo.png')}}">
	<title>Không tìm thấy trang</title>

	

	<!-- JQuery -->
	<script type="text/javascript" src="{{asset('public/vendor/homepage/jquery/jquery-3.3.1.min.js')}}"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/bootstrap/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/bootstrap/css/bootstrap-theme.min.css')}}"/>
	<script type="text/javascript" src="{{asset('public/vendor/homepage/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/font-awesome/css/font-awesome.min.css')}}"/>

	<!-- Font-Google -->
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">


</head>
<body style="background-color: #fff">

	<div class="container">

		<div class="wallpaper error404 text-center" style="box-shadow: none;">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<img src="{{asset('public/images/layouts/404_3.gif')}}" class="responsive" width="100%">
					<h2>Oops! Something went wrong</h2>
					<p>We couldn't find the page you were looking for</p>
					<p>Why not try back to the <a href="{{ route('index') }}">homepage.</a></p>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</div>

</body>
</html>