@extends('layouts.homepage.master')
@section('title')
Phongtrogiare.vn
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="wallpaper">
				<div class="row">
					<div class="col-sm-12">
						<div id="map" class="hidden-xs" style="width: 100%; height: 300px; margin: auto;"></div>
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
											<option data-tokens="123" value="123">12321</option>
										</select>

										<select class="selectpicker" data-live-search="true" id="selectdistrict">
											<option data-tokens="123" value="123">12321</option>
										</select>

										<select class="selectpicker" id="selectprice" data-live-search="true">
											<option data-tokens="khoang gia" min="1" max="10000000">Khoảng giá</option>
											<option data-tokens="Tu 500.000 VNĐ - 700.000 VNĐ" min="500000" max ="700000">Từ 500.000 VNĐ - 700.000 VNĐ</option>
											<option data-tokens="Tu 700.000 VNĐ - 1.000.000 VNĐ" min="700000" max ="1000000">Từ 700.000 VNĐ - 1.000.000 VNĐ</option>
											<option data-tokens="Tu 1.000.000 VNĐ - 1.500.000 VNĐ" min="1000000" max ="1500000">Từ 1.000.000 VNĐ - 1.500.000 VNĐ</option>
											<option data-tokens="Tu 1.500.000 VNĐ - 3.000.000 VNĐ" min="1500000" max ="3000000">Từ 1.500.000 VNĐ - 3.000.000 VNĐ</option>
											<option data-tokens="Tren 3.000.000 VNĐ" min="3000000" max="10000000">Trên 3.000.000 VNĐ</option>
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
						<h3 class="title-comm"><span class="title-holder">Tất cả nhà</span></h3>
						@for($i=1; $i<=10; $i++)
						<div class="col-sm-6 col-xs-12">
							<div class="room-item-vertical">
								<a href="#" title="">
									<div class="row">
										<div class="col-md-4">
											<div class="wrap-img-vertical">
												<img src="{{asset('public/images/rooms/room2.jpg')}}" alt="">
											</div>
										</div>
										<div class="col-md-8" style="padding: 0px;">
											<div class="col-md-12">
												<h5>Phòng dịch vụ full nội thất ngay Nguyễn Trãi Quận 1</h5>
												<p class="price">{{ number_format(1500000,0,",",".") }} đồng</p>
											</div>
											<div class="col-md-12 info">
												<span>
													<img src="{{asset('public/images/layouts/user.png')}}" alt="" width="30px" class="img-circle">
												</span>
												<span>27-07-1996 | Cần Thơ</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						@endfor

					</div>
				</div>
				<!-- End xem nhiều nhật -->
				<div class="row">
					<div class="col-sm-12 text-center">
						<nav aria-label="Page navigation">
						  <ul class="pagination">
						    <li>
						      <a href="#" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
						  </ul>
						</nav>
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
	    // $arrmergeLatln = array();

	    // $arrlatlng = json_decode($room->latlng,true);

	    $arrmergeLatln[] = ["lat"=> 9.604442100000002,"lng"=> 105.97815370000001,"title"=>'3434',"address"=>'4343',"phone"=> '332123',"slug"=>'232'];
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
        icon: "public/images/layouts/gps1.png",
        content: 'nhatrogiare'
      });
      var infowindow = new google.maps.InfoWindow();
      (function(nhatrogiare, data){

      	var content = 'Nhà nguyên căn Nguyễn Văn Linh gần BVĐKTƯ';

        infowindow.setContent(content);
        google.maps.event.addListener(nhatrogiare, "click", function(e){

            infowindow.setContent(content);
            infowindow.open(map, nhatrogiare);
                    // alert(data.title);
                });
        })(nhatrogiare,data);

    }

  }

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap&libraries=geometry,places" async defer></script>
@endsection
