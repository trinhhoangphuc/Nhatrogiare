@extends('layouts.homepage.master')
@section('title')
Đăng Tin
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
					<div class="col-sm-12">
						<div style="text-align: center;"><h3 style="color: #ff9511">Bài Viết Đã Đăng</h3></div>
						<br>
						<div class="text-center">
							<!-- <p class="text-danger">Bạn chưa có đăng tin nào! hãy đăng tin</p>
								<a href="" class="btn btn-danger"><i class="fa fa-edit"></i> Đăng Tin</a> -->
							<div class="table-responsive">
								<table class="table" id="example">
									<thead>
										<tr >
											<th class="text-center">Tiêu đề</th>
											<th class="text-center">Giá phòng</th>
											<th class="text-center">Lượt xem</th>
											<th class="text-center">Tình trạng</th>
											<th class="text-center">Chức năng</th>
										</tr>
									</thead>
									<tbody>
										@for($i=1; $i<=4; $i++)
										<tr>	
											<td ><p class="content">{{$i}} sdf dfsd fsdj sdbjsd ghjfv sdghjfvsdgj ggjsdg fg hjg sdgjfg hjsdg fhj gsdhjg hjgsd hjgsdhj gfhjsdg  fhjg sdhjfg fhjsg fhj sdhj fghjsdg fhjfg</p></td>
											<td>{{ number_format($i * 100000, 0, ',', '.') }}</td>
											<td>{{$i * 2}}</td>
											<td>
												<!-- <span class="label label-success">Đã duyệt</span> -->
												<!-- <span class="label label-warning">Chờ xử lý</span> -->
												<span class="label label-danger">Hủy Bỏ</span>
											</td>
											<td>
												<div class="dropdown">
													<button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list-ul" aria-hidden="true"></i> <span class="caret"></span></button>
													<ul class="dropdown-menu">
														<li><a href=""><i class="fa fa-eye"></i> Xem</a></li>
														<li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a></li>
														<li><a href=""><i class="fa fa-trash"></i> Xóa</a></li>
													</ul>
												</div>
											</td>
										</tr>
										@endfor
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>     
</div>  
@endsection
