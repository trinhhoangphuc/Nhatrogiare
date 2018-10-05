@extends('layouts.homepage.master')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<div class="container"> 
	@if(session("success"))
	<div class="alert alert-success-alt alert-dismissable fixed-alert">
		<span class="glyphicon glyphicon-certificate"></span>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{session("success")}}
	</div>
	@endif
	@if(session("error"))
	<div class="alert alert-danger-alt alert-dismissable fixed-alert">
		<span class="glyphicon glyphicon-certificate"></span>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{session("error")}}
	</div>
	@endif
	<div class="row profile">        
		<div class="col-md-3">          
			@include("layouts.homepage.menu-profile")    
		</div>      
		<div class="col-md-9"> 
			<div class="profile-content">
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-10">
						<div style="text-align: center;"><h3 style="color: #ff9511">Thông tin tài khoản</h3></div>
						<form class="" method="POST" action="" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<div class="form-group">
								<label class="control-label " for="email">Email:</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="" value="{{ Auth::user()->email }}" readonly>
							</div>
							<div class="form-group">
								<label class="control-label" for="pass">Mật khẩu: &nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#resetPass">Thay đổi</a></label>
								<input type="password" class="form-control" name="pass" id="pass" placeholder="Nhập mật khẩu" readonly value="**************">
							</div>
						</form>
					</div>
					<div class="col-sm-1"></div>
				</div>

			</div>  
			<br/>
			<div class="profile-content">
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-10">
						<div style="text-align: center;"><h3 style="color: #ff9511">Thông tin thành viên</h3></div>
						<form class="" method="POST" action="{{route('editInfo')}}" id="editInfo"enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label " for="name">Họ Tên:</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Tên hiển thị" value="{{Auth::user()->name}}">
							</div>
							<div class="form-group">
								<label class="control-label " for="email">Email liên hệ:</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="" value="{{ Auth::user()->email }}" readonly>
							</div>
							<div class="form-group">
								<label for="avtuser" class="control-label">Ảnh đại diện:</label>
								<input class="form-control" name="avtuser" id="avtuser" type="file" accept="image/*" onchange="loadFile(event)">
								<script>
									var loadFile = function(event) {
										var output = document.getElementById('output');
										output.src = URL.createObjectURL(event.target.files[0]);
									};
								</script>
							</div>
							<div class="form-group pull-right"> 
								<div class="col-sm-10">
									<button type="submit" class="btn  btn-warning">Cập Nhật</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-1"></div>
				</div>

			</div>   
		</div>  
	</div>
</div>
<div id="resetPass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="imgcontainer">
          <span class="close" data-dismiss="modal" title="Close Modal">&times;</span>
          <img src="{{asset('public/images/layouts/logo3.png')}}" alt="Avatar" class="avatar">
        </div>
      <div class="modal-body">
      	<form id="changePass" name="changePass" action="{{route('changePass')}}" method="POST">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      		<div class="form-group">
      			<label class="control-label" for="oldpass">Mật khẩu cũ:</label>
      			<input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Mật khẩu cũ">
      		</div>
      		<div class="form-group">
      			<label class="control-label" for="newpass">Mật khẩu mới:</label>
      			<input type="password" class="form-control" name="newpass" id="newpass" placeholder="Mật khẩu mới">
      		</div>
      		<div class="form-group">
      			<label class="control-label" for="repass">nhập lại mật khẩu:</label>
      			<input type="password" class="form-control" name="repass" id="repass" placeholder="Nhập mật khẩu">
      		</div>
      		<button type="submit" class="btn btn-warning" style="width: 100%">Cập Nhật</button>
      	</form>
      </div>
      <div class="footer-modal" style="background-color:#f1f1f1">
          <button type="button"  data-dismiss="modal" class="btn btn-danger">Hủy</button>
          <span class="psw">Quên <a href="">mật khẩu?</a></span>
      </div>
      
    </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$(function() {
		$("#changePass").validate({
			rules: {
				oldpass: {   
					required: true  
				},
				newpass : { 
					required: true, 
					maxlength:32,
					minlength:8
				},
				repass : { 
					required: true, 
					equalTo: "#newpass" 
				},
			},
			messages: {
				oldpass: {
					required: "Xin vui lòng mật khẩu củ"
				},
				newpass: {
					required: "Xin vui lòng nhập mật khẩu mới!",
					maxlength : "Mật khẩu không được quá 32 ký tự",
					minlength : "Mật khẩu không được nhỏ hơn 8 ký tự",
				},
				repass: {
					required: "Xin vui lòng nhập lại mật khẩu !",
					equalTo : "Nhập lại mật khẩu không chính xác!",
					
				}
			}
		});
	});

	$(function() {
		$("#editInfo").validate({
			rules: {
				name: {   
					required: true  
				},
			},
			messages: {
				name: {
					required: "Xin vui lòng mật khẩu củ"
				},
			}
		});
	});
</script>
@endsection
