@extends('layouts.homepage.master')
@section('title')
Đăng Nhập
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="wallpaper">
				<div style="width: 30%; margin:auto; margin-top: 10px; margin-bottom: 20px; width: 70%">
	            	<img src="{{asset('public/images/layouts/logo3.png')}}" width="100%">
	            </div>
	            <h3 class="title-comm" style="margin-top: 0; margin-bottom: 0;"><span class="title-holder">Đăng Nhập</span></h3>
	            <form action=""  role="form">
	              <input type="hidden" name="_token" value="{{ csrf_token() }}">
	              <div class="form-group">
	                <label for="email">Email/SĐT:</label>
	                <input type="email" class="form-control" id="email" name="email">
	                <p style="color:red;" id="errorEmail" class="hidden"></p>
	              </div>
	              <div class="form-group">
	                <label for="pwd">Mật khẩu:</label>
	                <input type="password" class="form-control" id="password" name="password">
	                <p style="color:red;"id="errorPass" class="hidden"></p>
	              </div>
	              <p class="reset">
	                Quên mật khẩu? Nhấn vào <a data-toggle="modal" data-target="#reset-password-form" href="#">đây</a>
	              </p>
	              <p style="color:red;" id="errorLogin" class="hidden">dsdsad</p>
	              <button type="button" class="btn btn-warning btn-block" id="login">Đăng Nhập</button>
	              <button type="button" class="btn btn-default btn-block">Đăng Ký</button>
	            </form> 
            </div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
@endsection
