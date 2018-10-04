@extends('layouts.homepage.master')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<div class="container"> 
	
	<div class="row profile">        
		<div class="col-md-3">          
			@include("layouts.homepage.menu-profile")    
		</div>      
		<div class="col-md-9"> 
			<div class="profile-content">
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-10">
						<div style="text-align: center;"><h3 style="color: #ff9511">Cập nhật thông tin</h3></div>
						<form class="" method="POST" action="" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label " for="pwd">Tên hiển thị:</label>
								<input type="text" class="form-control" name="txtname" placeholder="Tên hiển thị">
							</div>
							<div class="form-group">
								<label class="control-label" for="pwd">Mật khẩu cũ:</label>
								<input type="password" class="form-control" name="txtoldpass" placeholder="Nhập mật khẩu">
							</div>
							<div class="form-group">
								<label class="control-label" for="pwd">Mật khẩu:</label>
								<input type="password" class="form-control" name="txtpass" placeholder="Nhập mật khẩu">
							</div>
							<div class="form-group">
								<label class="control-label" for="pwd">Nhập lại mật khẩu:</label>
								<input type="password" class="form-control" name="txt-repass" placeholder="Nhập lại mật khẩu">
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
@endsection
