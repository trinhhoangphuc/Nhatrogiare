<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token()}}"/>

	<link rel="icon" type="images/jpg" sizes="16x16" href="{{asset('public/images/layouts/logo4.png')}}">
	<title>@yield('title')</title>


	<!-- JQuery -->
	<script type="text/javascript" src="{{asset('public/vendor/homepage/jquery/jquery-3.3.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/vendor/homepage/jquery/jquery.dataTables.min.js')}}"></script>
	

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/bootstrap/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/bootstrap/css/bootstrap-theme.min.css')}}"/>
	<script type="text/javascript" src="{{asset('public/vendor/homepage/bootstrap/js/bootstrap.min.js')}}"></script>

	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/jquery/jquery.dataTables.min.css')}}"/>

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/homepage/font-awesome/css/font-awesome.min.css')}}"/>

	<!-- Font-Google -->
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 

	<!-- Fileinput -->
	<link href="{{asset('public/vendor/homepage/fileinput/fileinput.min.css')}}" rel="stylesheet"> 
	<script type="text/javascript" src="{{asset('public/vendor/homepage/fileinput/fileinput.min.js')}}"></script>

	<!-- Bootstrap Select -->
	<link href="{{asset('public/vendor/homepage/bootstrap-select-1.12.4/css/bootstrap-select.min.css')}}" rel="stylesheet"> 
	<script type="text/javascript" src="{{asset('public/vendor/homepage/bootstrap-select-1.12.4/js/bootstrap-select.min.js')}}"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
	<script type="text/javascript" src="{{asset('public/js/function.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/responsive.css')}}">

</head>
<body >

	<!-- header -->
	@include('layouts.homepage.header')
	<!-- End Header -->
	<section>
		@yield('content')
	</section>
	<br>

	<!-- Footer -->
	<a id="back-to-top" href="#" class="btn btn-warning back-to-top" role="button" ><span class="glyphicon glyphicon-chevron-up"></span></a>
	@include('layouts.homepage.footer')
	<script type="text/javascript">
		$(document).ready(function(){
			
			$(window).scroll(function () {
				if ($(this).scrollTop() > 50) {
					$('#back-to-top').fadeIn();
				} else {
					$('#back-to-top').fadeOut();
				}
			});
		    // scroll body to 0px on click
		    $('#back-to-top').click(function () {
		    	$('#back-to-top').tooltip('hide');
		    	$('body,html').animate({
		    		scrollTop: 0
		    	}, 800);
		    	return false;
		    });
		    
		    $('#back-to-top').tooltip('show');

		    $('.table-responsive').on('show.bs.dropdown', function () {
		    	$('.table-responsive').css( "overflow", "inherit" );
		    });

		    $('.table-responsive').on('hide.bs.dropdown', function () {
		    	$('.table-responsive').css( "overflow", "auto" );
		    })

		    var tabel = $('#example').DataTable({
		    	responsive: true,
		    	"language": {
		    		"lengthMenu": "Hiển thị _MENU_ dòng",
		    		"info": "Hiển thị _START_ trong _TOTAL_ dòng ",
		    		"infoEmpty": "Dữ liệu rỗng",
		    		"emtyTable": "Chưa có dữ liệu nào",
		    		"processing": "Đang xử lý...",
		    		"search": "Tìm kiếm ",
		    		"loadingRecords": "Đang load dữ liệu",
		    		"zeroRecords": "Không tìm thấy dữ liệu",
		    		"infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
		    		"paginate": {
		    			"firt": "|<",
		    			"last": ">|",
		    			"next": ">>",
		    			"previous": "<<"
		    		}

		    	},
		    	"lengthMenu": [[10,15,20,25,30,-1],[10,15,20,25,30,"Tất cả"]]
		    });
		});
		
	</script>
</body>
</html>