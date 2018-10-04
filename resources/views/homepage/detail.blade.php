@extends('layouts.homepage.master')
@section('title')
Chi tiết
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="wallpaper">
				<div class="row detail">
					<div class="col-sm-12">
						<div class="sub-title">
							<a href="{{ route('index') }}">Trang chủ </a>&raquo;&nbsp;
							<a href="">{{ $loai->ten }} </a>&raquo;&nbsp;
							<a href="">{{ $tinh->ten }} </a>&raquo;&nbsp;
							<span>{{ $room->tieude }}</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8 detail">
						<div class="row">
								<div class="col-sm-12">
									<?php $imgURL = asset('public/images/rooms'); ?>
									<div class="product-information2">
										<div class="preview-pic tab-content">
										@foreach( $hinh as $item)
											@if($room->hinh == $item->ten)
										    <div class="tab-pane active" id="pc-{{$item->stt}}"><img src="{{$imgURL}}/{{$item->ten}}" class="size-img" /></div>
											@else
											<div class="tab-pane" id="pc-{{$item->stt}}"><img src="{{$imgURL}}/{{$item->ten}}" /></div>
											@endif
										@endforeach
										</div>
										<ul class="preview-thumbnail nav nav-tabs">
										@foreach( $hinh as $item)
											@if($room->hinh == $item->ten)
										 	<li class="active"><a data-target="#pc-{{$item->stt}}" data-toggle="tab"><img src="{{$imgURL}}/{{$item->ten}}" /></a></li>		
											@else
											<li><a data-target="#pc-{{$item->stt}}" data-toggle="tab"><img src="{{$imgURL}}/{{$item->ten}}" /></a></li>
											@endif
										@endforeach
										</ul>
										<br/>
									</div>
								</div>
								<div class="col-sm-12">
									<h4 class="title">{{ $room->tieude }}</h4>
									<p class="price">{{number_format($room->gia,0,",",".")}} đồng</p>
									<h5 class="title"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa Chỉ : <span style="font-weight: normal;"> {{ $room->diachi }}</span></h5>
									<p class="">
										<span class="title"><i class="fa fa-clone" aria-hidden="true"></i> Diện tích : <span style="font-weight: normal;"> {{ $room->dientich }} m<sup>2</sup></span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="title"><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày Đăng : <span style="font-weight: normal;"> {{ date('d/m/Y',strtotime($room->capNhat)) }}</span>
									</p>
									<hr>
									<div>
										{!! $room->mota !!}
									</div>
								</div>
								<div class="col-sm-12">
									<div id="map"></div>
								</div>
						</div>
					</div>
					<div class="col-sm-4">				
						<div class="row">
							<div class="col-sm-4">
								<?php $imgURLUser = asset('public/images/avatar'); ?>
								<img src="{{$imgURLUser}}/{{$user->avatar}}"  class="img-circle" alt="Cinque Terre" width="100%" height="100%" />
							</div>
							<div class="col-sm-8">
								<h5>Thông tin người đăng</h5>
								<p><b>{{ $user->name }}</b></p>
								<p><i class="far fa-clock"></i> Ngày tham gia : {{date('d/m/Y',strtotime($user->created_at))}}</p>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-sm-12 text-center" >
								<button id="btnGetPhone" class="btn btn-warning btn-block" style="font-size: 16px;"><i class="fa fa-phone"></i> Nhấn Hiện Số</button>
								<h3 id="getPhone" style="color:#ff9a1a;" class="hidden">{{$room->dienthoai}}</h3>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-sm-12" >
								<img src="{{asset('public/images/layouts/banner.gif')}}"  width="100%" height="100%" />
							</div>
						</div>

						<hr/>
						@if(count($same_room) > 1)
						<div class="row">
							<div class="col-sm-12">
								<h3 class="title-comm" style="margin-top: 0; margin-bottom: 0;"><span class="title-holder">Cùng Loại</span></h3>
								<div class="recommended_items"><!--recommended_items-->
						          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						              <div class="carousel-inner">
						                  <div class="item active">
											@foreach($same_room as $room)
												@if($loop->index < 2)
												<div class="col-sm-12">
													<div class="room-item-vertical">
														<a href="#" title="">
															<div class="row">
																<div class="col-md-12">
																	<div class="wrap-img-vertical">
																		<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
																	</div>
																</div>
																<div class="col-md-12" style="padding: 0px;">
																	<div class="col-md-12">
																		<h5>{{ $room->tieude }}</h5>
																		<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
																	</div>
																	<div class="col-md-12 info">
																		<span>
																			<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																		</span>
																		<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{$room->tinh_ten	}}</span>
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>
												@endif
											@endforeach
						                  </div> 
										  @if(count($same_room) >= 4)             
						                  <div class="item">
										    @foreach($same_room as $room)
												@if($loop->index >= 2)
												<div class="col-sm-12">
													<div class="room-item-vertical">
														<a href="#" title="">
															<div class="row">
																<div class="col-md-12">
																	<div class="wrap-img-vertical">
																		<img src="{{asset('public/images/rooms/'.$room->hinh)}}" alt="">
																	</div>
																</div>
																<div class="col-md-12" style="padding: 0px;">
																	<div class="col-md-12">
																		<h5>{{ $room->tieude }}</h5>
																		<p class="price">{{ number_format($room->gia,0,",",".") }} đồng</p>
																	</div>
																	<div class="col-md-12 info">
																		<span>
																			<img src="{{asset('public/images/avatar/'.$room->users_hinh)}}" alt="" width="30px" class="img-circle">
																		</span>
																		<span>{{date('d/m/Y',strtotime($room->capNhat))}} | {{$room->tinh_ten	}}</span>
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
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(9.604442100000002, 105.97815370000001),
      zoom: 15,
      draggable: true
    });
    /* Get latlng vị trí phòng trọ */
    <?php
	    $arrmergeLatln[] = ["lat"=> $room->lat,"lng"=> $room->lng,"title"=> $room->tieude];
	    $js_array = json_encode($arrmergeLatln);
	    echo "var javascript_array = ". $js_array . ";\n";
    ?>
    /* ---------------  */
    
    for (i in javascript_array){
      var data = javascript_array[i];
      var latlng =  new google.maps.LatLng(data.lat,data.lng);
      var nhatrogiare = new google.maps.Marker({

        position:  latlng,
        map: map,
        title: data.title,
        icon: "../public/images/layouts/gps1.png",
        content: 'nhatrogiare'
      });
      var infowindow = new google.maps.InfoWindow();
      (function(nhatrogiare, data){

      	var content = data.title;

        infowindow.setContent(content);
        infowindow.open(map, nhatrogiare);

        google.maps.event.addListener(nhatrogiare, "click", function(e){

            infowindow.setContent(content);
            infowindow.open(map, nhatrogiare);
                    
        });
        })(nhatrogiare,data);

    }

  }

</script>
<script>
$(document).ready(function(){
	$("#btnGetPhone").on("click", function(){
		$("#btnGetPhone").addClass("hidden");
		$("#getPhone").removeClass("hidden");
	});
});
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap&libraries=geometry,places" async defer></script>
@endsection
