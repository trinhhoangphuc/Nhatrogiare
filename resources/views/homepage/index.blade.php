@extends('layouts.homepage.master')
@section('title')
Nhatrogiare.vn
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="wallpaper">

				<div class="row">
					<div class="col-sm-12">
						<div class="banner hidden-xs" >
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="{{asset('public/images/layouts/banner1.png')}}" alt="">
									</div>
									<div class="item">
										<img src="{{asset('public/images/layouts/banner2.png')}}" alt="">
									</div>
									<div class="item">
										<img src="{{asset('public/images/layouts/banner3.jpg')}}" alt="">
									</div>
									<div class="item">
										<img src="{{asset('public/images/layouts/banner4.jpg')}}" alt="">
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>  
						</div>
						<br/>
						<div class="panel panel-default">
							<div class="panel-body search-header">
								<div class="row">
									<div class="col-sm-3" style="padding-left: 15px; padding-right: 15px;">
										<form >
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<div class="input-group" >
												<input type="text" class="form-control border-search" placeholder="Search for..." name="tuKhoa" id="tuKhoa">
												<span class="input-group-btn">
													<button class="btn btn-default btn-color" type="button" id="btnSearch" title="search"><i class="fa fa-search" aria-hidden="true"></i></button>
												</span>
											</div>
										</form>
									</div>
									<div class="col-sm-9">
										<select class="selectpicker" data-live-search="true" id="selectdistrict">
											@foreach($loai as $item)
											<option data-tokens="{{ $item->ten }}" value="{{ $item->ma }}">{{ $item->ten }}</option>
											@endforeach
										</select>

										<select class="selectpicker" data-live-search="true" id="selectdistrict">
											@foreach($tinh as $item)
											<option data-tokens="{{ $item->ten }}" value="{{ $item->ma }}">{{ $item->ten }}</option>
											@endforeach
										</select>

										<select class="selectpicker" id="selectprice" data-live-search="true">
											<option data-tokens="khoang gia" min="1" max="{{$max}}">Khoảng giá</option>
											<option data-tokens="Duoi 1 trieu dong" min="1" max ="1000000">Dưới 1 triệu đồng</option>
											<option data-tokens="Tu 1 trieu  den 3 trieu dong" min="1000000" max ="3000000">Từ 1 triệu đến 3 triệu đồng</option>
											<option data-tokens="Tu 3 trieu  den 5 trieu dong" min="3000000" max ="5000000">Từ 3 triệu  đến 5 triệu đồng</option>
											<option data-tokens="Tu 5 trieu  den 20 trieu dong" min="5000000" max ="20000000">Từ 5 triệu đến 20 triệu đồng</option>
											<option data-tokens="Tu 20 trieu  den 60 trieu dong" min="20000000" max="60000000">Từ 20 triệu đến 60 triệu đồng</option>
											<option data-tokens="Tu 60 trieu  den 100 trieu dong" min="60000000" max="100000000">Từ 60 triệu đến 100 triệu đồng</option>
											<option data-tokens="tren 100 trieu dong" min="100000000" max="999999999">Trên 100 triệu đồng</option>
										</select>

										<button class="btn btn-warning" onclick="searchMotelajax()">Tìm kiếm</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Xem nhiều nhật -->
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-comm"><span class="title-holder">Xem Nhiều Nhất</span></h3>
						<div class="recommended_items"><!--recommended_items-->
							<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active">
										@foreach($count_view as $room)
										@if($loop->index < 4)
										<div class="col-sm-6 col-xs-12">
											<div class="room-item-vertical">
												<a href="{{ route('detail', $room->ma) }}" title="">
													<div class="row">
														<div class="col-md-5">
															<div class="wrap-img-vertical">
																<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
															</div>
														</div>
														<div class="col-md-7" style="padding: 0px;">
															<div class="col-md-12">
																<h5>{{ $room->tieude }}</h5>
																<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
															</div>
															<div class="col-md-12 info">
																<span>
																	<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																</span>
																<span>|</span>
																<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{ $room->tinh_ten }}</span>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div> 
										@endif
										@endforeach
									</div>
									@if(count($count_view)>4)               
									<div class="item">
										@foreach($count_view as $room)
										@if($loop->index >= 4)
										<div class="col-sm-6 col-xs-12">
											<div class="room-item-vertical">
												<a href="{{ route('detail', $room->ma) }}" title="">
													<div class="row">
														<div class="col-md-5">
															<div class="wrap-img-vertical">
																<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
															</div>
														</div>
														<div class="col-md-7" style="padding: 0px;">
															<div class="col-md-12">
																<h5>{{ $room->tieude }}</h5>
																<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
															</div>
															<div class="col-md-12 info">
																<span>
																	<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																</span>
																<span>|</span>
																<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{ $room->tinh_ten }}</span>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div> 
										@endif
										@endforeach
									</div> 
									@endif                
								</div>
								<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>          
							</div>
						</div>
					</div>
				</div>
				<!-- End xem nhiều nhật -->
				<!-- Mới nhật -->
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title-comm"><span class="title-holder">Mới Đăng</span></h3>
						<div class="recommended_items"><!--recommended_items-->
							<div id="recommended-item-carousel2" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active">
										@foreach($new as $room)
										@if($loop->index < 4)
										<div class="col-sm-6 col-xs-12">
											<div class="room-item-vertical">
												<a href="{{ route('detail', $room->ma) }}" title="">
													<div class="row">
														<div class="col-md-5">
															<div class="wrap-img-vertical">
																<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
															</div>
														</div>
														<div class="col-md-7" style="padding: 0px;">
															<div class="col-md-12">
																<h5>{{ $room->tieude }}</h5>
																<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
															</div>
															<div class="col-md-12 info">
																<span>
																	<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																</span>
																<span>|</span>
																<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{ $room->tinh_ten }}</span>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div> 
										@endif
										@endforeach
									</div>
									@if(count($new)>4)               
									<div class="item">
										@foreach($count_view as $room)
										@if($loop->index >= 4)
										<div class="col-sm-6 col-xs-12">
											<div class="room-item-vertical">
												<a href="{{ route('detail', $room->ma) }}" title="">
													<div class="row">
														<div class="col-md-4">
															<div class="wrap-img-vertical">
																<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
															</div>
														</div>
														<div class="col-md-8" style="padding: 0px;">
															<div class="col-md-12">
																<h5>{{ $room->tieude }}</h5>
																<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
															</div>
															<div class="col-md-12 info">
																<span>
																	<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																</span>
																<span>|</span>
																<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{ $room->tinh_ten }}</span>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div> 
										@endif
										@endforeach
									</div> 
									@endif                
								</div>
								<a class="left recommended-item-control" href="#recommended-item-carousel2" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right recommended-item-control" href="#recommended-item-carousel2" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>          
							</div>
						</div>
					</div>
				</div>
				<!-- End Mới nhật -->
				<br/>
				<hr/>
				<div class="row">
					<div class="col-sm-12">
						<p id="contentSeoCat" class="_2JgEu82jRsWNU1H_QxOSsT" style="height: auto;">
							<div class="row block4" style="">
								<div class="col-xs-12"><h2 style="text-align: center;"><span style="font-size: 20px;"><strong>CHO THUÊ - MUA BÁN BẤT ĐỘNG SẢN</strong></span></h2><p style="text-align: justify;">Năm 2018 là năm của phân khúc bất động sản vừa túi tiền và bình dân. Bên cạnh đó, giá các sản phẩm trung và cao cấp không biến động nhiều, khả năng tăng giá là rất thấp. Căn hộ chung cư vẫn là phân khúc "nhộn nhịp" nhất trong thị trường bất động sản hiện nay. <a href="https://nha.chotot.com/tp-ho-chi-minh/mua-ban-can-ho-chung-cu" title="Căn hộ giá rẻ TPHCM"><em><strong>Căn hộ giá rẻ</strong></em></a>, vừa túi tiền, chủ yếu là căn hộ 1 - 2 phòng ngủ với mức giá 1 - 2 tỷ đồng là phân khúc chủ đạo và có tình thanh khoản tốt. Dấu hiệu tốt khi nhu cầu mua bán căn hộ chung cư ở khu vực phía Bắc tăng đáng kể so với mọi năm.</p><p style="text-align: justify;"></p></div>
							</div>
							<div class="row block4">
								<div class="col-xs-12"><p style="text-align: justify;"></p><p style="text-align: justify;">Việc mua bất động sản để đầu tư hay để ở đòi hỏi rất nhiều công sức nghiên cứu tỉ mỉ, bạn càng nghiên cứu kỹ lưỡng thì bạn sẽ ít gặp phải những điều không mong muốn.&nbsp;</p><p style="text-align: justify;">Và để đảm bảo việc <em><strong><a title="Mua bán bất động sản Hà Nội" href="" target="_blank">mua bán bất động sản</a></strong></em>&nbsp;trở nên hiệu quả hơn, hãy cùng Chợ Tốt Nhà điểm qua các&nbsp;bí kíp cần thiết dưới đây:</p><p style="padding-left: 30px; text-align: justify;">✅ Kiểm tra kỹ hợp đồng và chứng từ cần thiết khi mua bán nhà đất, chung cư. Phải làm việc với chủ nhân đứng tên nhà đất. Nếu làm việc với các môi giới hoặc công ty cần xác định rõ lai lịch và độ tin tưởng trước khi đặt mua.</p><p style="padding-left: 30px; text-align: justify;">✅ Khi&nbsp;mua bất động sản cần tìm hiểu các tiện ích, dịch vụ và hạ tầng xung quanh.&nbsp;</p><p style="padding-left: 30px; text-align: justify;">✅&nbsp;Nếu các bạn mua theo dạng trả góp nên tìm hiểu kỹ các khoản lãi suất và phí ngân hàng từ phía công ty cung cấp dịch vụ trước khi mua.</p><p style="padding-left: 30px; text-align: justify;">✅ Hẹn gặp tại các địa điểm công cộng và thông báo với nhân viên Chợ Tốt nếu bắt gặp bất kỳ hành vi mua bán không trung thực nhé!</p><p style="padding-left: 30px; text-align: right;"><em><strong>--- <a href="" title="">Nhà trọ giá rẻ</a> ---</strong></em></p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection
