@extends('layouts.homepage.master')
@section('title')
Đăng Ký
@endsection
@section('content')
<style type="text/css">
	.error{color:red;}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="wallpaper">
				<div style="width: 30%; margin:auto; margin-top: 10px; margin-bottom: 20px; width: 70%">
	            	<img src="{{asset('public/images/layouts/logo3.png')}}" width="100%">
	            </div>
	            <h3 class="title-comm" style="margin-top: 0; margin-bottom: 0;"><span class="title-holder">Đăng Ký</span></h3>
	            <form action="{{route('postRegisterUser')}}" method="POST" role="form" id="register">
	              <input type="hidden" name="_token" value="{{ csrf_token() }}">
	              <div class="form-group">
	                <label for="name">Họ & Tên:</label>
	                <input type="text" class="form-control" id="name" name="name">
	              </div>
	              <div class="form-group">
	                <label for="email">Email:</label>
	                <input type="email" class="form-control" id="email" name="email">
	              </div>
	              <div class="form-group">
	                <label for="pwd">Mật khẩu:</label>
	                <input type="password" class="form-control" id="pwd" name="password">
	              </div>
	              <div class="form-group">
	                <label for="repwd">Nhập lai mật khẩu:</label>
	                <input type="password" class="form-control" id="repwd" name="repassword">
	              </div>
	              <p class="reset">
	                Bạn đã có tài khoản? Nhấn vào <a data-toggle="modal" data-target="#reset-password-form" href="#">đăng nhập</a> 
	              </p>
	              <button type="submit" class="btn btn-warning btn-block" id="login">Đăng Ký</button>
	            </form> 
            </div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#register").validate({
			rules: {
				name: {   
					required: true  
				},
				email: {
					required: true,
					email: true
				},
				password : { 
					required: true, 
					maxlength:32,
					minlength:8
				},
				repassword : { 
					required: true, 
					equalTo: "#pwd" 
				},
			},
			messages: {
				name: {
					required: "Xin vui lòng nhập tên !"
				},
				email: {
					required: "Xin vui lòng nhập email !",
					email: "Email không đúng định dạng"
				},
				password: {
					required: "Xin vui lòng nhập mật khẩu !",
					maxlength : "Mật khẩu không được quá 32 ký tự",
					minlength : "Mật khẩu không được nhỏ hơn 8 ký tự",
				},
				repassword: {
					required: "Xin vui lòng nhập lại mật khẩu !",
					equalTo : "Nhập lại mật khẩu không chính xác!",
					
				}
			}
		});
	});
</script>
@endsection
